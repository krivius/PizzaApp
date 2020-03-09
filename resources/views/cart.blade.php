
@extends('layout')

@section('content')
    <div id="featured-content" height="500">
        <div id="mainMenu">

            <h3>YOUR ORDER: </h3>
    <form action="/placeOrder" method="POST">
    @CSRF
        <div class="container">
            <ul class="list-group">
            @foreach(json_decode($cartData) as $item)
                <li class="list-group-item">
                    {{$item->name}}
                    <span class="badge">{{$item->quant}}</span>
                </li>
            @endforeach
            </ul>
        </div>
        <hr/>
        <h3>Total: </h3><span></span>
        <hr/>
        <div class="form-group">
            <label for="phoneNum">Phone number:</label>
            <input
                type="tel"
                name="phoneNum"
                id="phoneNum"
                placeholder="8-XXX-XXX-XX-XX"
                pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{4}"
                required
            >
            <br/>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required class="form-control"><br/>
            <label for="comment">Comment:</label>
            <input type="textarea" name="comment" id="comment" rows="5"  cols="50" class="form-control"><br/>
            <label for="paymentMethod">Payment method:</label><br/>
            <input type="radio" name="paymentMethod" value="0"  disabled="disabled"> Pay online <small>(temporary unavailable)</small><br/>
            <input type="radio" name="paymentMethod" value="1"  required> cash to courier<br/>
            <input type="radio" name="paymentMethod" value="2"  required> by card to courier<br/>
            <hr/>
            <input type="submit" id="submitOrder" class="btn  btn-primary" value="place order"/>
        </div>
    </form>
        </div>
    </div>
@endsection
