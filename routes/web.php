<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TreeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcomeuser', function () {
    return view('welcome');
});
/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */

 Route::get('/test-jquery', function () {
    return view('test-jquery');
});

 Route::get('/', function () {
    return view('auth/login');
});
//Route::get('profile', 'UserController@profile')->name('profile');
//Route::post('profile', 'UserController@update_avatar');
//Route::post('profileupdate', 'UserController@update_info');

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::post('profile', [UserController::class, 'update_avatar']);
Route::post('profileupdate', [UserController::class, 'update_info']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/userHome', [HomeController::class, 'index'])->name('userHomes');

Route::get('/departments', [TreeController::class, 'treeView'])->name('departments');
//Route::get('/department', [TreeController::class, 'treeView'])->name('department');

Route::post('/login/custom', [UserController::class, 'login'])->name('login.custom');
Route::get('/addUser',[UserController::class, 'createUser']);
Route::post('/storeNewUser',[UserController::class, 'storeUser']);
Route::post('/depusers', [UserController::class, 'getUsersTable'])->name('depusers.data');
Route::get('/editDep',[UserController::class, 'editDep'])->name('editDep');
Route::post('/storeNewDep', [UserController::class, 'storeDep']);
Route::get('/deleteDep/{id}', [UserController::class, 'deleteDep']);
Route::get('/datatable', [UserController::class, 'getIndex']);
Route::get('/anyData', [UserController::class, 'anyData'])->name('datatables.data');
Route::get('/delete/{id}', [UserController::class, 'destroy']);
Route::get('/profileEdit/{id}', [UserController::class, 'getUserProfile']);
Route::post('/profileEdit/{id}', [UserController::class, 'getUserProfileInfoUpdated']);
Route::post('/profileEditPhoto/{id}', [UserController::class, 'getUserProfilePhotoUpdated']);

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/datatable', 'UserController@getIndex');
//Route::get('/anyData', 'UserController@anyData')->name('datatables.data');
//Route::get('/delete/{id}', 'UserController@destroy');
//Route::get('/profileEdit/{id}', 'UserController@getUserProfile');
//Route::post('/profileEdit/{id}', 'UserController@getUserProfileInfoUpdated');
//Route::post('/profileEditPhoto/{id}', 'UserController@getUserProfilePhotoUpdated');
//Route::get('/addUser','UserController@createUser');
//Route::post('/storeNewUser','UserController@storeUser');
//Route::post('/login/custom', 'UserController@login')->name('login.custom');
/* Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){
        return view('home');
    })->name('home');
    Route::get('/userHome', function(){
        return view('userHome');
    })->name('userHome');
}); */
//Route::get('/departments', 'TreeController@treeview')->name('departments');
//Route::post('/depusers', 'UserController@getUsersTable')->name('depusers.data');
//Route::get('/editDep','UserController@editDep')->name('editDep');
//Route::post('/storeNewDep', 'UserController@storeDep');
//Route::get('/deleteDep/{id}','UserController@deleteDep');
