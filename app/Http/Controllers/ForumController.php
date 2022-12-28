<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Forum;
use App\Models\Objective;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('course.forum.create', [
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'attachment' => ['required', 'File'],
            // 'objective' => ['required', 'array'],
            // 'objective.*' => ['required', 'string']
        ]);

        $data = $request->except('objective');
        $data['courseID'] = $course->id;

        // $objectives = $request->objective;
        // foreach($objectives as $objective){
        //     Objective::create([
        //         'courseID' => $course->id,
        //         'description' => $objective
        //     ]);
        // }

        Forum::create($data);
        return redirect('/courses/'.$course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Forum $forum)
    {
        return view('course.forum.edit', [
            'course' => $course,
            'forum' => $forum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'attachment' => ['required', 'File'],
            // 'objective' => ['required', 'array'],
            // 'objective.*' => ['required', 'string']
        ]);

        $data = $request->except('objective');
        $data['courseID'] = $course->id;

        $forum = Forum::find($id);
        $forum->update($data);

        // $objectives = $request->objective;
        // foreach($objectives as $objective){
        //     Objective::create([
        //         'courseID' => $course->id,
        //         'description' => $objective
        //     ]);
        // }
        return redirect('/courses/'.$course->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
