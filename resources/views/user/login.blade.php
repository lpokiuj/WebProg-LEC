@extends('template')

@section('content')

<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex align-items-center justify-content-center container flex-column border-primary" style="border: 4px solid #1FB486; height: 500px; width: 400px; border-radius: 5px;">
        <div class="row text-primary">
            <h1>
                Learn
            </h1>
        </div>
        <div class="row text-danger" style="height: 50px;">
        @if(session()->has('error'))
                <p>{{ session()->get('error') }}</p>
            @endif
            @if ($errors->any())
            <ul class="ps-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="row">
            <form action="/login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email" class="email form-title">Email address</label>
                    <input type="text" id="email" name="email" class="form-control " placeholder="Enter your email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label form-title">Password</label>
                    <input type="password" id="email" name="password" class="password form-control" placeholder="Enter your password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" type="checkbox" id="remember-me" name="remember" value=true>Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary login-button" style="width: 100%;">Login</button>
                <div class="d-flex justify-content-center my-2">Or</div>
                <a href="/register" class="btn btn-primary login-button mb-2" style="width: 100%;">Register</a>
            </form>
        </div>

        
    </div>

</div>
@endsection
