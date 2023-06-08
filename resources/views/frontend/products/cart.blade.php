@extends('layouts.front')

@section('title')
    my card
@endsection

@section('content')
@php
    $totalPrice = 0;
@endphp
    <div class="container">
        <div class="card product_data mb-5">
            @if(count($cartitems) > 1)
            <div class="card-body">
                <div class="row">
                    @foreach($cartitems as $item)
                       <div class="cart-card d-flex">
                        <div class="col-md-2">
                                <img src="{{$item->products->image}}" alt="." class="imgF">
                            </div>
                            <div class="col-md-5 pt-5">
                                <h3>{{$item->products->name}}</h3>
                            </div>
                            <div class="col-md-3 pt-5">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                <h4>Kolicina: <span>{{$item->prod_qty}}</span></h4>
                                <h4>Ciijena: <span>${{$item->products->selling_price}}</span></h4>
                                @php
                                    $totalPrice += $item->products->selling_price * $item->prod_qty;
                                @endphp
                            </div>
                            <div class="col-md-2 details pt-5">
                                <a href="{{ url('delete/'.$item->id) }}" class="btn-delite">Delite</a>
                            </div>
                       </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between mx-5 mt-5">
                    <h4>Ukupna cijena: <span>${{$totalPrice}}</span></h4>
                    <button class="btn-buy">Buy</button>
                </div>

            </div>
            @else
            <div class="d-flex mx-5 justify-content-center flex-column">
                <h1 class="text-center mt-5">Prazna košarica</h1>
                <img src="{{asset('assets/image/online-shopping.png')}}" alt="shop" style="width:500px; height:500px;" class="mx-auto">
            </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
<script>
    function incrementValue()
    {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10) {
            value++;
        }
        document.getElementById('qty').value = value;
    }
    function decrementValue()
    {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 0 : value;
        if(value >1) {
            value--;
        }
        document.getElementById('qty').value = value;
    }
</script>
@endsection
