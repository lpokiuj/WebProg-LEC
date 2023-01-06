@extends('template')

@section('content')
<div class="container" style="min-height: 100vh;">
    @if(auth()->user()->isTeacher)
        <div class="row">
            <form class="" action="/courses/{{$course->id}}" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger mt-3" type="submit" style="width: 100%;">Remove Course</button>
            </form>
        </div>
        <div class="row">
            <a href="/courses/{{$course->id}}/edit">
                <button class="btn btn-success mt-1" type="submit" style="width: 100%;">Edit Course</button>
            </a>
        </div>
    @endif
    <div class="row mt-4">
        <div class="col-3 d-flex align-items-center justify-content-center">
            <img src="/User.svg" style="height: 100%;" alt="">
        </div>
        <div class="col-9">
            <div>
                <h1>{{ $course->name }}</h1>
            </div>
            <div>
                <p>{{ $course->description }}</p>
            </div>
            @if(auth()->user()->isTeacher)
            @else
            <div>
                @php
                    $flag = 0;
                @endphp
                @foreach($course->students as $student)
                    @if($student->id == auth()->id())
                        @php
                            $flag = 1;
                        @endphp
                    @endif
                @endforeach
                @if($flag == 1)
                    
                    <form action="/courses/{{ $course->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger d-flex justify-content-center" style="width: 100%;">Quit</button>
                    </form>
                @else
                <form action="/enroll/{{ $course->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Enroll</button>
                    </form>
                @endif
            </div>
            @endif
            
        </div>
    </div>
    @if(auth()->user()->isTeacher)
        <div class="row">
            <div>
                <a href="/courses/{{ $course->id }}/forums/create" class="btn btn-success" style="width: 100%;">Create forum</a> 
            </div>
        </div>
    @endif
    
    <div class="row mt-3">
        <nav>
            <div class="nav nav-tabs">
                @foreach ($course->forums as $forum)
                    <button class="nav-link @if($forum->id == 1) active @endif" data-bs-toggle="tab" data-bs-target="#nav-tab-{{ $forum->id }}" type="button" >Session {{ $forum->id }}</button>
                @endforeach
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @foreach ($course->forums as $forum)
                <div class="tab-pane fade @if($forum->id == 1) show active @endif" id="nav-tab-{{$forum->id}}" tabindex="0">
                    @if(auth()->user()->isTeacher)
                        <div class="row mt-3">
                            <div>
                                <a href="/courses/{{ $course->id }}/forums/{{$forum->id}}/edit" class="btn btn-success mt-1" style="width: 100%;">Edit Session {{$forum->id}}</a>    
                            </div>
                        </div>
                    @endif
                    <div class="row mt-4">
                        <h2>{{ $forum->title }}</h2>
                    </div>
                    <div class="row">
                        <p>{{ $forum->description }}</p>
                    </div>
                    <div class="row">
                        <h3>Objective</h3>
                        
                    </div>
                    <div class="row">
                        <ul class="ms-4">
                            @foreach ($forum->objectives as $objective)
                                <li>{{ $objective->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <h3>Attachment</h3>
                    </div>
                    <div class="row mb-4">
                        <div class="d-flex bg-white justify-content-around align-items-center text-dark ms-3 py-2" style="border-radius: 5px; width: 25%;">
                            <div class="">{{$forum->attachment}}</div>
                            <a href="" style="cursor: pointer;">
                                <img src="/Download.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
