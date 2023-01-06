@extends('template')

@section('content')
    <div class="container" style="height: 90vh;">
        <div class="row text-primary mt-3">
            <h1>Create Course</h1>
        </div>
        <div class="row text-danger">
            @if ($errors->any())
                <ul class="">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <form action="/courses" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                <input type="type" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Course Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <!-- <label for="name">Name: </label>
            <input type="text" name="name" id=""> -->
            <!-- <label for="description">Description: </label>
            <input type="text" name="description"> -->
            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
        </form>
    </div>
@endsection
