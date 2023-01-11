@extends('template')

@section('content')

<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex align-items-center justify-content-center container flex-column border-primary" style="border: 4px solid #1FB486; height: 500px; width: 400px; border-radius: 5px;">
        <div class="row text-primary">
            <h1>
                Learn
            </h1>
        </div>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLang"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ strtoupper(config('app.locale')) }}
              {{-- Language --}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="http://127.0.0.1:8000/login/en">EN</a></li>
              <li><a class="dropdown-item" href="http://127.0.0.1:8000/login/id">ID</a></li>
            </ul>
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
                    <label for="email" class="email form-title">@lang('user/login.email')</label>
                    <input type="text" id="email" name="email" class="form-control " placeholder="@lang('user/login.email_ph')">
                    <div id="emailHelp" class="form-text">@lang('user/login.email_help')</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label form-title">@lang('user/login.pass')</label>
                    <input type="password" id="email" name="password" class="password form-control" placeholder="@lang('user/login.pass_ph')">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" type="checkbox" id="remember-me" name="remember" value=true>@lang('user/login.check_box')</label>
                </div>
                <button type="submit" class="btn btn-primary login-button" style="width: 100%;">@lang('user/login.login')</button>
                <div class="d-flex justify-content-center my-2">@lang('user/login.or')</div>
                <a href="/register" class="btn btn-primary login-button mb-2" style="width: 100%;">@lang('user/login.register')</a>
            </form>
            
            
            <!-- <form action="/login" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="login d-flex justify-content-center flex-column">
                    <label for="email" class="email">E-mail</label>
                    <input type="text" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="login  d-flex justify-content-center flex-column">
                    <label class="email">Password</label>
                    <input type="password" id="email" name="password" class="password" placeholder="Enter your password">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember-me" name="remember" value=true>
                    <label>Remember me</label>
                </div>
                <button type="submit" class="login-button">Login</button>
            </form> -->
        </div>


    </div>

</div>
@endsection
