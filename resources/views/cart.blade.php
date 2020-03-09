
@extends('layout')

@section('content')
{{--    {$cartData = json_decode($cartData);--}}
    <ul id="cartContents">
    @foreach(json_decode($cartData) as $item)
        <li>
            <span class="pizza_id">{{$item->id}}</span>
            <span class="pizza_quantity">{{$item->quant}}</span>
            <span class="pizza_price">{{$item->price_usd}}</span>
            <span class="pizza_price">{{$item->price_eur}}</span>
        </li>
        <hr/>
    @endforeach
    </ul>

@endsection
