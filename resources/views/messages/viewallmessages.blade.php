@extends('layouts.nonindex')
@section('title', 'Messages')
@section('content')

<div class="w3-container w3-content w3-padding-64">
    <div class="w3-container">
        <h1 class="w3-center">Your Messages</h1>

        @foreach ($messages as $msg)
            
        <div class="w3-card-4 w3-padding-16">

            <header class="w3-container w3-light-grey">
              <h3>{{$msg->name}}</h3>
            </header>
            
            <div class="w3-container">
              <p>{{$msg->message}}</p>
              <hr>
              <p>{{$msg->email}} IP: {{$msg->ipaddress}}</p>
            </div>

            <form action="{{route('message_delete',$msg->id)}}" method="POST">
                @csrf
            <button class="w3-button w3-block w3-dark-grey" type="submit">- Delete</button>
            </form>
        </div>

        @endforeach
        

    </div>
    

</div>


@endsection