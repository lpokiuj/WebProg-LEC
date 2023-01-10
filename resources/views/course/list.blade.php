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
<div class="container">
    <div class="row bg-primary d-flex justify-content-center align-items-center mt-5" style="height: 18rem; border-radius: 10px;">
        <div>
            <form class="d-flex flex-column mx-5" role="search">
                <label for="">
                    <h1 class="text-white">
                        What do you want to learn?
                    </h1>
                </label>
                <form class="form-inline my-2 my-lg-0" style="padding: 0 2rem;" action="/list-course">
                    <input type="hidden" name="sort" value="{{ request('sort', '') }}">
                    <input class="form-control mr-sm-2 py-2" type="search" placeholder="Search Movies Name.." aria-label="Search Movies" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-success text-white mt-2" style="border: 2px solid white;">Submit</button>
                </form>
            </form>
        </div>
    </div>
    <div class="row text-primary mt-3">
        <h1>Course List</h1>
    </div>
    <div class="row" style="min-height: 980px">
        @forelse ($queriedCourses as $course)
        <a href="/courses/{{$course->id}}" class="card m-2 text-dark" style="width: 18rem; height: 20rem; text-decoration: none;">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text" style="height: 68%; overflow: hidden;">{{ $course->description }}</p>
                <!-- <button href="#" class="btn btn-primary d-flex justify-content-center" style="width: 100%;">Enroll</button> -->
                <form action="/enroll/{{ $course->id }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Enroll</button>
                </form>
            </div>
        </a>
        <!-- <h1>{{ $course->name }}</h1>
        <p>{{ $course->description }}</p>
        <div>
            <form action="/enroll/{{ $course->id }}" method="POST">
                @csrf
                <button type="submit">Enroll</button>
            </form>
        </div>
        <hr> -->
        @empty
            <h3 class="d-flex justify-content-center align-items-center" style="filter:invert(80%); height: 20rem;">No course that has been added by the teacher</h3>
        @endforelse
    </div>
    

</div>

@endsection
