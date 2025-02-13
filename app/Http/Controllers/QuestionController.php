<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Chapter;
use App\Models\Keyword;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Auth;
use Validator;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        return view('admin.questions.index');
    }

    public function getAjax()
    {
        $question= Question::orderBy('created_at','desc')->with('keywords' , 'branch')->get();
        try {
            return Datatables::of($question)->addIndexColumn()->make(true);
        } catch (Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $branches = Branch::all();
//        $keywords = Keyword::all();

        return view('admin.questions.create',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $delete_check = ',deleted_at,NULL';
        $validate = Validator::make($request->all(), [

            'title' => 'required|string|min:3|max:254',

            'question' => 'required|string|min:3|max:40000',
            'answer' => 'required|string|min:3|max:40000',

//            'keywords' => 'required|array',
//            'keywords.*' => 'required|integer|exists:keywords,id'.$delete_check,

            'branch_id' => 'required|integer|exists:branches,id'.$delete_check,
            'chapter_id' => 'required|integer|exists:chapters,id'.$delete_check,
            'section_id' => 'integer|exists:sections,id'.$delete_check,

        ])->validate();

        $requestData = $request->all();

        $requestData['created_by'] = Auth::id();

        $question = Question::create($requestData);

//        $question->keywords()->attach($request->keywords);

        return redirect('questions')->with('flash_message', __('flash_message.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return View
     */
    public function show($id)
    {
        return redirect('questions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector|Factory|View
     */
    public function edit($id)
    {
        $question = Question::with('keywords')->where('id',$id)->first();
        if (!$question) {
            return redirect('questions');
        }

        $branches = Branch::all();

//        $keywords = Keyword::all();

        $chapters = Chapter::where('branch_id',$question->branch_id)->get();

        $sections = Section::where('chapter_id',$question->chapter_id)->get();

        return view('admin.questions.edit', compact('question','branches', 'chapters','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $delete_check = ',deleted_at,NULL';
        $validate = Validator::make($request->all(), [

            'title' => 'required|string|min:3|max:254',

            'question' => 'required|string|min:3|max:40000',
            'answer' => 'required|string|min:3|max:40000',

//            'keywords' => 'required|array',
//            'keywords.*' => 'required|integer|exists:keywords,id'.$delete_check,

            'branch_id' => 'required|integer|exists:branches,id'.$delete_check,
            'chapter_id' => 'required|integer|exists:chapters,id'.$delete_check,
            'section_id' => 'integer|exists:sections,id'.$delete_check,

        ])->validate();

        $question = Question::findOrFail($id);

        $requestData = $request->all();

        $requestData['updated_by'] = Auth::id();

        $question->update($requestData);

//        $question->keywords()->detach();
//
//        $question->keywords()->attach($request->keywords);

        return redirect('questions')->with('flash_message',  __('flash_message.edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return int
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if ($question) {
            $question->delete();
            return 1;
        }
        return 0;
    }

}
