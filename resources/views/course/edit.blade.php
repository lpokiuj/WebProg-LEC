<!DOCTYPE html>
@extends('template')

@section('content')
<div class="container" style="min-height: 90vh;">
    <div class="row text-primary mt-3">
        <h1>Edit Course</h1>
    </div>
    <div class="row text-danger">
        @if ($errors->any())
            <h4>Error</h4>
            <ul class="">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="row">
        <form action="/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Course Name</label>
                <input type="type" name="name" class="form-control" value="{{ $course->name }}" placeholder="{{ $course->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea name="description" class="form-control" value="{{ $course->description }}" placeholder="{{ $course->description }}" rows="5">{{ $course->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
<!-- 
            <label for="name">Name: </label>
            <input type="text" name="name" id="" value="{{ $course->name }}">
            <label for="description">Description: </label>
            <input type="text" name="description" value="{{ $course->description }}">
            <button type="submit">Submit</button> -->
        </form>
    </div>
</div>
    

@endsection
