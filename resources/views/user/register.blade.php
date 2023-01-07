@extends('template')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex align-items-center justify-content-center container flex-column border-primary" style="border: 4px solid #1FB486; height: 600px; width: 400px; border-radius: 5px;">
        <div class="row text-primary">
            <h1>
                Learn
            </h1>
        </div>
        <div class="row text-danger" style="height: 80px;">
            @if ($errors->any())
            <ul class="ps-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="row">
            <form action="/register" method="POST" style="width: 20rem;">
                @csrf
                <div class="mb-3">
                    <label for="name" class="name form-title">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email" class="email form-title">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter your e-mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="password form-title">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="confirm form-title">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password">
                </div>
                <label for="password_confirmation" class="confirm form-title">Register </label>
                <select class="form-select mb-3" name="isTeacher" aria-label="Default select example">
                    <option value="0" selected>Student</option>
                    <option value="1">Teacher</option>
                </select>
                <button type="submit" class="btn btn-primary login-button mb-3" style="width: 100%;">Register</button>
            </form>     
        </div> 
    </div>
</div>
@endsection
