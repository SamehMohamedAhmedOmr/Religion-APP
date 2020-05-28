<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        //Session::put('locale', $locale);
        return redirect()->back()->withCookie(cookie()->forever('locale', $locale));
    }
    return redirect()->back()->withCookie(cookie()->forever('locale', 'en')); // default
});

Route::middleware('guest')->group(function () {

    Route::get('login', function () {
        return view('auth.login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', 'DashboardController@welcome');
    Route::get('/', 'DashboardController@welcome');


    // Questions
    Route::resource('branches', 'BranchController');
    Route::get('getBranchesAjax', 'BranchController@getAjax');

    // Questions
    Route::resource('chapters', 'ChapterController');
    Route::get('getChaptersAjax', 'ChapterController@getAjax');
    Route::get('getChapters/{branch_id}', 'ChapterController@getChapters');

    // Questions
    Route::resource('sections', 'SectionController');
    Route::get('getSectionsAjax', 'SectionController@getAjax');
    Route::get('getSections/{chapter_id}', 'ChapterController@getSections');

    // Questions
    Route::resource('keywords', 'KeywordController');
    Route::get('getKeywordsAjax', 'KeywordController@getAjax');

    // Questions
    Route::resource('questions', 'QuestionController');
    Route::get('getQuestionsAjax', 'QuestionController@getAjax');

});



Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');


/** **/

// Route::get('chartjs', function () {
//     return view('Pages.charts.chartjs');
// });

// Route::get('buttons', function () {
//     return view('Pages.ui-features.buttons');
// });

// Route::get('typography', function () {
//     return view('Pages.ui-features.typography');
// });

// Route::get('basic_elements', function () {
//     return view('Pages.forms.basic_elements');
// });

//Route::get('mdi', function () {
//    return view('Pages.icons.mdi');
//});


Route::get('translations', function () {
    return view('vendor.translation-manager.index');
});
