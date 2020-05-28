<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Section;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Validator;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        return view('admin.sections.index');
    }

    public function getAjax()
    {
        $section= Section::all();
        try {
            return Datatables::of($section)->addIndexColumn()->make(true);
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
        return view('admin.sections.create');
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
            'chapter_id' => 'required|integer|exists:chapters,id'.$delete_check,
        ])->validate();

        $requestData = $request->all();

        Section::create($requestData);

        return redirect('sections')->with('flash_message', __('flash_message.added'));
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
        return redirect('sections');
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
        $section = Branch::find($id);
        if (!$section) {
            return redirect('sections');
        }
        return view('admin.sections.edit', compact('section'));
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
            'chapter_id' => 'required|integer|exists:chapters,id'.$delete_check,
        ])->validate();

        $section = Section::findOrFail($id);

        $requestData = $request->all();

        $section->update($requestData);

        return redirect('sections')->with('flash_message',  __('flash_message.edited'));
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
        $section = Section::find($id);
        if ($section) {
            $section->delete();
            return 1;
        }
        return 0;
    }

}
