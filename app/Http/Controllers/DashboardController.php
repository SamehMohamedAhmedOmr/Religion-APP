<?php

namespace App\Http\Controllers;


use App\Models\Branch;
use App\Models\Chapter;
use App\Models\Keyword;
use App\Models\Question;
use App\Models\Section;
use Auth;


class DashboardController extends Controller
{

    public function welcome()
    {
        $branches = Branch::count();
        $sections = Section::count();
        $chapters = Chapter::count();
        $keywords = Keyword::count();
        $questions = Question::count();

        return view('pages.dashboard',
            compact('branches','sections','chapters','keywords', 'questions'));
    }

}
