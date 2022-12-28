<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Name: {{ $course->name }}
    Desciption: {{ $course->description }}

    @foreach ($course->forums as $forum)
        <p>Title: {{ $forum->title }}</p>
        <p>Description: {{ $forum->description }}</p>
        <p>Attachment: {{ $forum->attachment }}</p>
    @endforeach

    <a href="/courses/{{ $course->id }}/forums/create">Create forum</a>

    <form class="" action="/courses/{{$course->id}}" method="POST" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <button class="" type="submit">Remove</button>
    </form>
</body>
</html>
