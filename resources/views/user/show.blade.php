@extends('template')

@section('content')
<style>
        .card{
        cursor: pointer;
        transition: 0.3s;
    }
    .card:hover{
        box-shadow: 0 0px 10px rgba(13,110,253);
    }

    .add-course{
        height: 50px; 
        text-decoration: none;
        border-radius: 10px;
    }
    .card-text{
        /* text-overflow: ellipsis; */
        overflow: hidden;
        display: -webkit-box !important;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical; 
        white-space: normal;
    }
</style>

    <div class="container" style="min-height: 100vh;">
        <div class="row mt-4">
            <div class="col-3 d-flex align-items-center justify-content-center">
                <img src="/User.svg" style="height: 100%;" alt="">
            </div>
            <div class="col-9">
                <div>
                    <h1>{{ $user->name }}</h1>
                </div>
                <div>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @if(auth()->user()->isTeacher)
                <h1>Your Courses</h1>
            @else
                <h2>Course that your already enroll</h2>
            @endif
        </div>
        <div class="row">
        @guest
        @else
            @if(auth()->user()->isTeacher)
                @if($courses->count() > 0)
                    @foreach ($courses as $course)
                    <a href="/courses/{{$course->id}}" class="card m-2 text-dark" style="width: 18rem; height: 20rem; text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text" style="height: 68%; overflow: hidden;">{{ $course->description }}</p>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <h3 class="d-flex justify-content-center align-items-center" style="filter:invert(80%); height: 20rem;">No course has been signed</h3>
                @endif
            @else
                @if($courses->count() > 0)
                    @foreach ($courses as $course)
                    <a href="/courses/{{$course->id}}" class="card m-2 text-dark" style="width: 18rem; height: 20rem; text-decoration: none;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text" style="height: 70%;">{{ $course->description }}</p>
                            <form action="/courses/{{ $course->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger d-flex justify-content-center" style="width: 100%;">Quit</button>
                            </form>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <h3 class="d-flex justify-content-center align-items-center" style="filter:invert(80%); height: 20rem;">No course has been signed</h3>
                @endif
            @endif
        @endguest 
    </div>
    </div>
@endsection