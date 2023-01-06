@extends('template')

@section('content')
<div class="container">
    <div class="row text-danger">
        @if ($errors->any())
            <ul class="">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="row">
        <form action="/courses/{{ $course->id }}/forums/{{ $forum->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="type" name="title" class="form-control" value="{{$forum->title}}" placeholder="Course Title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea name="description" class="form-control" placeholder="{{$forum->description}}" rows="5">{{$forum->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" name="attachment" value="{{$forum->attachment}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Objective</label>
                <div>
                    <div class="d-flex flex-column" id="inputObjective">
                        @foreach ($forum->objectives as $objective)
                        <div class="d-flex mt-1">
                            <input type="type" name="objective[]" class="form-control" value="{{$objective->description}}" placeholder="Objectives">
                            <button type="button" class="btn btn-danger ms-2" id="delete">Delete</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-success" id="addObjective" style="width: 100%;">Add more objective</button>
            </div>

            <button type="submit" class="btn btn-primary mb-5" style="width: 100%">Submit</button>
            <!-- <label for="title">Title: </label>
            <input type="text" name="title" id="" value="{{ $forum->title }}"> -->
            <!-- <label for="description">Description: </label>
            <input type="text" name="description" value="{{ $forum->description }}">
            <label for="attachment">Attachment: </label>
            <input type="file" name="attachment" value="{{ $forum->attachment }}"> -->
            <!-- <div>
                <label for="objective">Objective</label>
                <input type="text" name="objective[]">
                <input type="text" name="objective[]">
                <input type="text" name="objective[]">
            </div> -->
            <!-- <button type="submit">Submit</button> -->
        </form>
    </div>

</div>
<script type="text/javascript">
        $(document).ready(function(){
            $('#addObjective').on('click',function(){
                let line=`
                <div class="d-flex mt-1">
                    <input type="type" name="objective[]" class="form-control" placeholder="Objectives">
                    <button type="button" class="btn btn-danger ms-2" id="delete">Delete</button>
                </div>
                `;
                console.log("tess");

                $('#inputObjective').append(line);
            })
        })

        $(document).on('click', '#delete', function(){
            $(this).parent().remove();
        })
    </script>

    
@endsection
