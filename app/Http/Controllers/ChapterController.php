<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Chapter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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
        $chapter = Chapter::all();
        try {
            return Datatables::of($chapter)->addIndexColumn()->make(true);
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
        return view('admin.chapters.create');
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:254',
        ])->validate();

        $requestData = $request->all();

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
        $chapter = Branch::find($id);
        if (!$chapter) {
            return redirect('chapters');
        }
        return view('admin.chapters.edit', compact('chapter'));
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:254',
        ])->validate();

        $chapter = Chapter::findOrFail($id);

        $requestData = $request->all();

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
