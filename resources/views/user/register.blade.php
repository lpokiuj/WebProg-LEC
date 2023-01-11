@extends('template')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh">
    <div class="d-flex align-items-center justify-content-center container flex-column border-primary" style="border: 4px solid #1FB486; height: 600px; width: 400px; border-radius: 5px;">
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
              <li><a class="dropdown-item" href="http://127.0.0.1:8000/register/en">EN</a></li>
              <li><a class="dropdown-item" href="http://127.0.0.1:8000/register/id">ID</a></li>
            </ul>
          </div>

        <div class="row text-danger" style="height: 50px;">
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
                    <label for="name" class="name form-title">@lang('user/register.name')</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="@lang('user/register.name_ph')">
                </div>
                <div class="mb-3">
                    <label for="email" class="email form-title">@lang('user/register.email')</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="@lang('user/register.email_ph')">
                </div>
                <div class="mb-3">
                    <label for="password" class="password form-title">@lang('user/register.pass')</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="@lang('user/register.pass_ph')">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="confirm form-title">@lang('user/register.pass_confirmation')</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="@lang('user/register.pass_conf_ph')">
                </div>
                <label for="password_confirmation" class="confirm form-title">@lang('user/register.register_as') </label>
                <select class="form-select mb-3" name="isTeacher" aria-label="Default select example">
                    <option value="0" selected>@lang('user/register.student_option')</option>
                    <option value="1">@lang('user/register.teacher_option')</option>
                </select>
                <button type="submit" class="btn btn-primary login-button mb-3" style="width: 100%;">Register</button>
            </form>     
        </div> 
    </div>
</div>
@endsection
