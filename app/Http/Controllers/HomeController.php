<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Question;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $last_questions = 0;
    private $last_results = 1;

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

      //  $keywords = Keyword::all();

        $most_views = Question::orderBy('views','desc')->where('views', '!=', 0)->take(10)->get();

        $key = $this->last_questions;

        return view('Pages.search.index',
            compact('questions', 'most_views', 'key'));
    }
}
