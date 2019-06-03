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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::patch('/tasks/{task}' ,'ProjectTasksController@update');

Route::resource('projects','ProjectsController')->middleware('can:update,project');//->middleware('can::update,project')

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
