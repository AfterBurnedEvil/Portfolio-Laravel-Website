@extends('layouts.nonindex')
@section('title', 'Edit Project')
@section('content')

<div class="w3-container">
<form class="w3-container w3-card-4 w3-light-grey" action="{{ route('project_edit',$projdetails->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <h2>Edit this project</h2>
        <p>Use this to edit the project information.</p>
      
        <p>
        <label>Title</label>
        <input class="w3-input w3-border w3-round" name="title" type="text" value="{{$projdetails->title}}"></p>
        <p>
        <label>Image</label><br><p>
        Current Picture:</p>
        <img src="/images/{{$projdetails->img}}" style="width:20%">
        <p>Choose New Picture </p>
        <input type="file" name="imgz" value="/images/{{$projdetails->img}}">
        <p>
        <label>Body</label>
        
        <textarea style="height: 150px; resize: none;" name="body" type="textarea">{{$projdetails->body}}</textarea></p>
        <input name="hidden_img" type="hidden" value="{{$projdetails->img}}">
        <button class="w3-button w3-round-xlarge w3-blue" type="submit">Submit</button> <br>
</form>
    
</div>
<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'body' );
</script>

@endsection