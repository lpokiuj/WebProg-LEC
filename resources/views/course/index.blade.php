<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach ($courses as $course)
        <p>Name: {{ $course->name }}</p>
        <p>Description: {{ $course->description }}</p>
        <p>Forum</p>
        @foreach ($course->forums as $forum)
            <p>Title: {{ $forum->title }}</p>
            <p>Description: {{ $forum->description }}</p>
            <p>Attachment: {{ $forum->attachment }}</p>
            <p>Objective</p>
            @foreach ($forum->objectives as $objective)
                <p>{{ $objective->description }}</p>
                <br>
            @endforeach
            <br>
        @endforeach
        <br>
    @endforeach

</body>
</html>
