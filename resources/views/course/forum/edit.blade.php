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
        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/courses/{{ $course->id }}/forums/{{ $forum->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Title: </label>
        <input type="text" name="title" id="" value="{{ $forum->title }}">
        <label for="description">Description: </label>
        <input type="text" name="description" value="{{ $forum->description }}">
        <label for="attachment">Attachment: </label>
        <input type="file" name="attachment" value="{{ $forum->attachment }}">
        <button type="submit">Submit</button>
    </form>

</body>
</html>
