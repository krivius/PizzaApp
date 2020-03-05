@extends('layout')



@section('content')

        <div id="featured-content" height="500">
            <div id="mainMenu">

            </div>
        </div>


@endsection


@section('mainMenu')
    <script>
        const  myData = {!! $pizzas !!};
    </script>
    <script src="/js/app.js"></script>
@endsection

