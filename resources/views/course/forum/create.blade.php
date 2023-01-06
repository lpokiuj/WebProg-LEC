@extends('template')

@section('content')
<div class="container" style="min-height: 90vh;">
    <div class="row text-primary mt-3">
        <h1>Create Forum</h1>
    </div>
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
        <form action="/courses/{{ $id }}/forums" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="type" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Course Title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="attachment">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Objective</label>
                <div id="inputObjective">
                    <div class="d-flex" >
                        <input type="type" name="objective[]" class="form-control" placeholder="Objectives">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-success" id="addObjective" style="width: 100%;">Add more objective</button>
            </div>
            <button type="submit" class="btn btn-primary mb-5" style="width: 100%">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript">
        $(document).ready(function(){
            $('#addObjective').on('click',function(){
                let line=`
                <div class="d-flex mt-2">
                    <input type="type" name="objective[]" class="form-control" placeholder="Objectives">
                    <button type="button" class="btn btn-danger ms-2" id="delete">Delete</button>
                </div>
                `;
                $('#inputObjective').append(line);
            })
        })

        $(document).on('click', '#delete', function(){
            $(this).parent().remove();
        })
    </script>
@endsection
