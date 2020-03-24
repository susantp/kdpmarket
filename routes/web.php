<?php

use App\SponsorRecruiter;
use App\Member;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', 'Admin\MembershipController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('membership', 'Admin\MembershipController');
Route::get('changeInfo', 'Admin\MembershipController@changeInfo')->name('changeInfo');
Route::post('checkUserID','Admin\MembershipController@checkUserID')->name('checkUserID');
Route::post('checkRecruiterAjax', 'Admin\MembershipController@checkRecruiterInfo')->name('checkRecruiterInfo');
Route::get('sponsor', function () {
    return view('backend.chart');
})->name('sponsorchart');
//page route
Route::get('/home', 'Pages\PageController@index')->name('home');
Route::get(
    'changepassword',
    function () {
        return view('cauth.changepassword');
    }
)->name('changepassword');

Route::post('dochangepassword', 'Admin\MembershipController@checkPassword')->name('dochangepassword');
Route::get('sponsors', function () {
    return view('backend.chart');
})->name('sponsors');


Route::get('chartdata', function () {

$collections = App\Member::select('userID', 'sponsor_id','recruiter_id')->get();

$newcol = array_map(function ($collection) {
return array(
'pid' => $collection['sponsor_id'],
'id' => $collection['userID'],
'title' => $collection['userID'],
);
}, $collections->toArray());

return $newcol;
// $filtered = [];
// for ($i = 0; $i < count($collections); $i++) {

// array_push($filtered, $collections[$i]->only(['id', 'userID', 'sponsor_id']));

// }
// return $collections;
return response()->json($newcol);

})->name('chartdata');
