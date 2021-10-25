@extends('layouts.nonindex')
@section('title', 'Create Project')
@section('content')

<div class="w3-container">

    <form method="POST" action="{{ route('project_store') }}" enctype="multipart/form-data">
        @csrf
        <h2>Create a New Project</h2>
        <p>Use this to create a new project information.</p>
      
        <p>
        <label>Title</label>
        <input class="w3-input w3-border w3-round" name="title" type="text"></p>
        <p>
        <label>Image</label><br>
        <input type="file" name="imgz">
        <p>
        <label>Body</label>
        <textarea style="height: 150px; resize: none;" class="ckeditor" name="body" type="textarea"></textarea></p>
        <button class="w3-button w3-round-xlarge w3-blue" type="submit">Submit</button> <br>
      </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

@endsection