<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @forelse ($courses as $course)
        <h1>{{ $course->name }}</h1>
        <p>{{ $course->description }}</p>
        <div>
            <form action="/enroll/{{ $course->id }}" method="POST">
                @csrf
                <button type="submit">Enroll</button>
            </form>
        </div>
        <hr>
    @empty
        <h1>No courses</h1>
    @endforelse
</body>
</html>
