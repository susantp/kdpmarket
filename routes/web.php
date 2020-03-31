<?php

use App\SponsorRecruiter;
use App\Member;
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

Route::get('/', 'Admin\MembershipController@index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('membership', 'Admin\MembershipController');
Route::get('changeInfo', 'Admin\MembershipController@changeInfo')->name('changeInfo');
Route::post('checkUserID', 'Admin\MembershipController@checkUserID')->name('checkUserID');
Route::post('checkRecruiterAjax', 'Admin\MembershipController@checkRecruiterInfo')->name('checkRecruiterInfo');
Route::get('sponsor', function () {
    return view('backend.chart', ['role' => 'member']);
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
Route::get('memberchangepassword', 'Admin\MembershipController@memberChangePassword')->name('memberchangepassword');
// Route::get('sponsors', function () {
//     return view('backend.chart');
// })->name('sponsors');


Route::get('chartdata', function () {

    $collections = App\Member::select('userID', 'sponsor_id', 'name')->get();

    $newcol = array_map(function ($collection) {
        return array(
            'pid' => $collection['sponsor_id'],
            'id' => $collection['userID'],
            'name' => $collection['name'],

        );
    }, $collections->toArray());

    return $newcol;
    return response()->json($newcol);
})->name('chartdata');

Route::prefix('/member')->name('member.')->namespace('Member')->group(function () {
    Route::get('dashboard', 'MemberController@index')->name('dashboard');
    Route::get('dashboard/edit/{id}','MemberController@edit')->name('memberEdit');
    Route::post('dashboard/edit/{id}','MemberController@update')->name('memberUpdate');
    Route::namespace('Auth')->group(function () {
        //Login Routes
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });
});
