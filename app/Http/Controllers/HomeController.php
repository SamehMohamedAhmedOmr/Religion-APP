<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $questions = Question::orderBy('created_at','desc')->take(10)->get();

        return view('Pages.search.index',compact('questions'));
    }
}
