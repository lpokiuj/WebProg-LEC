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
    .card-title{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
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

<div class="container" style="min-height: 980px;">
    <div class="row bg-primary d-flex justify-content-center align-items-center mt-5" style="height: 18rem; border-radius: 10px;">
        <div>
            <form class="d-flex flex-column mx-5" role="search">
                <label for="">
                    <h1 class="text-white">
                        What do you want to learn?
                    </h1>
                </label>
                <input class="form-control" type="search" placeholder="Search Courses here..." aria-label="Search">
                <button class="btn btn-outline-success text-white mt-2" style="border: 2px solid white;" type="submit">Search</button>
            </form>
        </div>
    </div>
    @guest
        @else
            @if(auth()->user()->isTeacher)
                <a href="/courses/create" class="row btn btn-success mt-2 d-flex justify-content-center align-items-center add-course">
                    Create Course
                </a>
            @endif
    @endguest

    <div class="row text-primary mt-3">
        @if(auth()->user()->isTeacher)
            <h1>Your Courses</h1>
        @else
            <h1>Assigned Course</h1>
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
                            <p class="card-text" style="height: 69%;">{{ $course->description }}</p>
                            <form action="/quit/{{ $course->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger d-flex justify-content-center" style="width: 100%;">Quit</button>
                            </form>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <h3 class="d-flex justify-content-center align-items-center" style="filter:invert(80%); height: 20rem;">No course has been Assigned</h3>
                @endif
            @endif
        @endguest
    </div>
</div>
@endsection
