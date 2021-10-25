@extends('layouts.nonindex')
@section('content')

<div class="w3-container w3-center">
    <div class="w3-panel w3-red">
        <h3>IT'S BWOKEN!</h3>
        <p>Connection with the database failed,Please try again.</p>
        <a href="{{url()->previous()}}"> <button class="w3-button w3-block w3-dark-grey" type="submit">Go Back</button></a>
      </div> 
</div>

@endsection