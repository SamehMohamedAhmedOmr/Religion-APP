<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Chapter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Auth;
use Validator;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        return view('admin.chapters.index');
    }

    public function getAjax()
    {
        $chapter = Chapter::with('branch')->get();
        try {
            return Datatables::of($chapter)->addIndexColumn()->make(true);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function getChapters($branch_id){
        $chapters = Chapter::where('branch_id',$branch_id)->get();
        return response()->json($chapters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $branches = Branch::all();

        return view('admin.chapters.create', compact('branches'));
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
            'name' => 'required|string|min:3|max:254',
            'branch_id' => 'required|integer|exists:branches,id'.$delete_check
        ])->validate();

        $requestData = $request->all();

        $requestData['created_by'] = Auth::id();

        Chapter::create($requestData);

        return redirect('chapters')->with('flash_message', __('flash_message.added'));
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
        return redirect('chapters');
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
        $chapter = Chapter::find($id);
        $branches = Branch::all();

        if (!$chapter) {
            return redirect('chapters');
        }
        return view('admin.chapters.edit', compact('chapter','branches'));
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
            'name' => 'required|string|min:3|max:254',
            'branch_id' => 'required|integer|exists:branches,id'.$delete_check
        ])->validate();

        $chapter = Chapter::findOrFail($id);

        $requestData = $request->all();

        $requestData['updated_by'] = Auth::id();

        $chapter->update($requestData);

        return redirect('chapters')->with('flash_message',  __('flash_message.edited'));
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
        $chapter = Chapter::find($id);
        if ($chapter) {
            $chapter->delete();
            return 1;
        }
        return 0;
    }

}
