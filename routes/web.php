<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;

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
Route::get('/login/{lang}', function ($lang) {
    App::setLocale($lang);
    return view ('user.login');
});

Route::get('/register/{lang}', function ($lang) {
    App::setLocale($lang);
    return view ('user.register');
});

Route::get('/courses/{lang}', function ($lang) {
    App::setLocale($lang);
    return view ('course.index');
});

Route::group(['middleware' => ['isTeacher']], function(){
    Route::resource('forums', ForumController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('courses.forums', ForumController::class);
});

Route::group(['middleware' => ['auth']], function(){
    Route::resource('forums', ForumController::class)->only([
        'index',
        'show'
    ]);
    Route::resource('courses', CourseController::class)->only([
        'index',
        'show'
    ]);
    Route::resource('courses.forums', ForumController::class)->only([
        'index',
        'show'
    ]);
    Route::get('/list-course', [CourseController::class, 'courseList']);
    Route::post('/enroll/{course}', [CourseController::class, 'enroll']);
    Route::get('/profile', [UserController::class, 'show']);
    Route::delete('/quit/{course}', [CourseController::class, 'quit']);
});

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/home', function () {
    return redirect('/courses');
});

Route::get('/login', function(){
    return view('user.login');
})->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::get('/register', function(){
    return view('user.register');
})->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout']);
