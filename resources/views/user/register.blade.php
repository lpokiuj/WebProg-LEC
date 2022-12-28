<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ($errors->any())
        <h4>Error</h4>
        <ul class="ps-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/register" method="POST">
        @csrf
        <div class="login">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="login">
            <label class="email">E-mail</label>
            <input type="text" id="email" name="email" placeholder="Enter your e-mail">
        </div>
        <div class="login">
            <label class="password">Password</label>
            <input type="password" id="email" name="password" placeholder="Enter your password">
        </div>
        <div class="login">
            <label class="confirm-password">Confirm Password</label>
            <input type="password" id="email" name="password_confirmation" placeholder="Confirm your password">
        </div>
        <div>
            <select name="isTeacher" id="">
                <option value="0">Student</option>
                <option value="1">Teacher</option>
            </select>
        </div>
        <button type="submit" class="login-button">Register</button>
    </form>
</body>
</html>
