
@extends('layout')

@section('content')
{{--    @dd($cartData, $images);--}}
    <div id="featured-content" height="500">
        <div id="mainMenu">

            <h3>ORDER DETAILS: </h3>
            <hr/>
    <form action="/placeOrder" method="POST">
    @CSRF
        @php
            $total_usd = 0;
            $total_eur = 0;
        @endphp
        <div class="container">
            <ul class="list-group">
            @php $i=0; @endphp
            @foreach(json_decode($cartData) as $item)
                @php
                    $total_usd += $item->price_usd;
                    $total_eur += $item->price_eur;
                @endphp
                <li class="list-group-item">
                    <img src="/images/pizza/{{$images[$i]}}" class="pizzaThumbnail"/>
                    <span class="cartPizzaName">{{$item->name}}</span>
                    <div class="order-item-info">
                        <span class="cartPrice">{{$item->price_usd}} &#36; / {{$item->price_eur}} &#8364; </span>
                        <input type="text" name="quantity[]" value="{{$item->quant}}"  class="form-control quant-input"/>
                        <input type="hidden" name="id[]" value="{{$item->id}}">

                    </div>
                </li>
                @php $i++; @endphp
            @endforeach
            </ul>
            <input type="hidden" name="total" value="{{$total_usd}}">
        </div>
        <hr/>
        <h3>Total: <i>{{$total_usd}}&#36; / {{$total_eur}}&#8364;</i></h3>
        <hr/>
        <div class="form-group">
            <label for="clientName">Your name:</label>
            <input type="text" name="clientName" id="clientName" required class="form-control"><br/>
            <label for="phoneNum">Phone number:</label>
            <input
                type="tel"
                name="phoneNum"
                id="phoneNum"
                placeholder="8-XXX-XXX-XXXX"
                pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{4}"
                required
                title="Enter 8-911-954-3186 to check the order history or make a few orders on the same namber"
            >
            <br/>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required class="form-control"><br/>

            <label for="comment">Comment:</label>
            <input type="textarea" name="comment" id="comment" rows="4"  cols="50" class="form-control" width="250px"><br/>

            <label for="paymentMethod">Payment method:</label><br/>
            <input type="radio" name="paymentMethod" value="1"  disabled="disabled"> Pay online <small>(temporary unavailable)</small><br/>
            <input type="radio" name="paymentMethod" value="2"  required> cash to courier<br/>
            <input type="radio" name="paymentMethod" value="3"  required> by card to courier<br/>
            <hr/>
            <input type="submit" id="submitOrder" class="btn  btn-primary" value="PROCEED TO PAYMENT"/>
        </div>
    </form>
        </div>
    </div>
@endsection
