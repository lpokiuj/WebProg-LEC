<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseStudent;
use App\Models\CourseTeacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $courses = [];
        if($user->isTeacher){
            $courses = Course::whereHas('teachers', function($query) use ($user){
                $query->where('userID', $user->id);
            })->with('teachers')->get();
        }
        else{
            $courses = Course::whereHas('students', function($query) use ($user){
                $query->where('userID', $user->id);
            })->with('teachers')->get();
        }
        return view('course.index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        if(!$user->isTeacher){
            abort(401);
        }

        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        $data = $request->all();
        $course = Course::create($data);

        CourseTeacher::create([
            'courseID' => $course->id,
            'userID' => $user->id
        ]);

        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id)->load([
            'forums',
            'teachers'
        ]);

        return view('course.show', [
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        $user = User::find(Auth::id());
        $courseTeacher = CourseTeacher::where('courseID', $id)->first();
        if($courseTeacher->userID != $user->id){
            abort(401);
        }

        return view('course.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string']
        ]);

        $data = $request->all();
        $course = Course::find($id);
        $course->update($data);
        return redirect('/courses/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        foreach($course->forums as $forum){
            DB::table('objectives')->where('forumID', $forum->id)->delete();
        }
        DB::table('forums')->where('courseID', $course->id)->delete();
        Course::destroy($course->id);
        return redirect('/courses');
    }

    public function enroll(Course $course)
    {
        $user = User::find(Auth::id());
        if($user->isTeacher){
            abort(401);
        }

        CourseStudent::create([
            'userID' => $user->id,
            'courseID' => $course->id
        ]);

        return redirect('/courses');
    }

    public function courseList()
    {
        $user = User::find(Auth::id());
        if($user->isTeacher){
            abort(401);
        }

        $courses = Course::whereDoesntHave('students', function($query) use ($user){
            $query->where('userID', $user->id);
        })->get();

        return view('course.list', [
            'courses' => $courses
        ]);
    }
}
