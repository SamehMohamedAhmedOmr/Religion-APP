<?php

namespace App\Http\Controllers;


use Auth;


class DashboardController extends Controller
{

    public function welcome()
    {
        $branches = 0;
        $questions = 0;

        return view('pages.dashboard',
            compact('branches'));
    }

}
