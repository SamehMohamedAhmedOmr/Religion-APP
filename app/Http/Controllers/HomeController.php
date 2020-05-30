<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Question;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Validator;

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
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        //  $keywords = Keyword::all();
        if (count($request->all())){
            $this->validateSearch($request);

            if ($request->search_type == 'text'){ // Search with question title
                $questions = $this->searchByTitle($request);
                $key = $this->last_results;
            }
            elseif ($request->search_type == 'fatwa_number'){ // search with id
                $questions = $this->searchById($request);
                $key = $this->last_results;
            }
            else{
                $questions = $this->getLastsTenRecords();
                $key = $this->last_questions;
            }
        }
        else{
            $questions = $this->getLastsTenRecords();
            $key = $this->last_questions;
        }

        $most_views = Question::orderBy('views','desc')->where('views', '!=', 0)->take(10)->get();


        return view('Pages.search.index',
            compact('questions', 'most_views', 'key'));
    }

    private function validateSearch($request){
        $validate = Validator::make($request->all(), [
            'search_type' => 'string',
            'search_key' => 'string'
        ])->validate();
    }

    private function getLastsTenRecords(){
        return Question::orderBy('created_at','desc')->paginate(10);
    }

    private function searchById($request){
        return Question::where('id', $request->search_key)->take(1)->paginate(1);
    }

    private function searchByTitle($request){
        $question = Question::where('title' , 'LIKE' , '%'.$request->search_key . '%')
            ->orderBy('created_at','desc')->paginate(10);

        return $this->attachQueryString($request, $question);
    }

    private function  attachQueryString($request, $question){
        $querystringArray = [
            'search_type' => $request->search_type,
            'search_key' => $request->search_key
        ];

        $question->appends($querystringArray);

        return $question;
    }

    public function get($id){

        if (!is_numeric($id)){
            return redirect('/');
        }

        $question = Question::with('branch')->where('id',$id)->first();

        if (!$question){
            return redirect('/');
        }

        $question->views = $question->views +1;
        $question->save();

        $most_views = Question::orderBy('views','desc')->where('views', '!=', 0)->take(10)->get();

        return view('Pages.search.show',
            compact('question', 'most_views'));
    }

}
