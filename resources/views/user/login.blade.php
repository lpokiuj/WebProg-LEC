<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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

    <form action="/login" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="login">
            <label for="email" class="email">E-mail</label>
            <input type="text" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="login">
            <label class="email">Password</label>
            <input type="password" id="email" name="password" class="password" placeholder="Enter your password">
        </div>
        <div class="remember-me">
            <input type="checkbox" id="remember-me" name="remember" value=true>
            <label>Remember me</label>
        </div>
        <button type="submit" class="login-button">Login</button>
    </form>
</body>
</html>