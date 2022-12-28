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

    <form action="/courses/{{ $id }}/forums" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title: </label>
        <input type="text" name="title" id="">
        <label for="description">Description: </label>
        <input type="text" name="description">
        <label for="attachment">Attachment: </label>
        <input type="file" name="attachment">
        <button type="submit">Submit</button>
    </form>

</body>
</html>
