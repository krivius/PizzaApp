
@extends('layout')

@section('content')

{{--    @dd($history)--}}
    <div id="featured-content" height="500">
        <div id="mainMenu">
            <h3>Success!</h3>
            <p>Our operator will contact you within 5 minutes to confirm the order.</p>
            <h2>Order history:</h2>
            @foreach($history as $id => $order)
{{--                @dd($id, $order)--}}
                <h3>Order <i>#{{$id}}</i></h3>
                <ul class="list-group history-group">

                @foreach($order as $details)
                        <li class="list-group-item">
                            <img src="/images/pizza/{{$details[1]}}" class="pizzaThumbnail"/>
                            <span class="cartPizzaName">{{$details[2]}} x {{$details[0]}}</span>
                        </li>
                @endforeach
                </ul>
            @endforeach
        </div>
    </div>


@endsection
