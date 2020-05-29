<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Keyword;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Auth;
use Validator;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        return view('admin.keywords.index');
    }

    public function getAjax()
    {
        $keywords = Keyword::all();
        try {
            return Datatables::of($keywords)->addIndexColumn()->make(true);
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
        return view('admin.keywords.create');
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

        $requestData['created_by'] = Auth::id();

        Keyword::create($requestData);

        return redirect('keywords')->with('flash_message', __('flash_message.added'));
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
        return redirect('keywords');
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
        $keyword = Keyword::find($id);
        if (!$keyword) {
            return redirect('keywords');
        }
        return view('admin.keywords.edit', compact('keyword'));
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

        $keyword = Keyword::findOrFail($id);

        $requestData = $request->all();

        $requestData['updated_by'] = Auth::id();

        $keyword->update($requestData);

        return redirect('keywords')->with('flash_message',  __('flash_message.edited'));
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
        $keyword = Keyword::find($id);
        if ($keyword) {
            $keyword->delete();
            return 1;
        }
        return 0;
    }

}
