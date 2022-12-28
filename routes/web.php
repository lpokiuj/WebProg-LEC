<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;

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

Route::resource('objectives', ObjectiveController::class);
Route::resource('forums', ForumController::class);
Route::resource('courses', CourseController::class);
Route::resource('courses.forums', ForumController::class);

Route::get('/', function () {
    return redirect('/courses');
});
