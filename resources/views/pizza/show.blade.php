@extends('layout')

@section('content')

    <div id="featured-content">
        <h1>{{$pizza->name}}</h1>

        <img src="/images/pizza/{{$pizza->image_addr}}" class="fullImage">
        <h3 style="float: left; position: absolute">{{$pizza->price}}$</h3>
        <p class="fullInfo">{{$pizza->full_info}}</p>
    </div>



@endsection
