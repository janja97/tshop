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
            @if(count($cartitems) > 0)
            <div class="card-body">
                <div class="row">
                    @foreach($cartitems as $item)
                       <div class="cart-card d-flex">
                        <div class="col-md-2">
                                <img src="{{ optional($item->products)->image }}" alt="." class="imgF">
                            </div>
                            <div class="col-md-5 pt-5">
                                <h3>{{ optional($item->products)->name }}</h3>
                            </div>
                            <div class="col-md-3 pt-5">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                <h4>Kolicina: <span>{{$item->prod_qty}}</span></h4>
                                <h4>Ciijena: <span>${{ optional($item->products)->selling_price }}</span></h4>
                                @php
                                    $sellingPrice = optional($item->products)->selling_price;
                                    $qty = intval($item->prod_qty);
                                    $totalPrice += ($sellingPrice !== null ? $sellingPrice : 0) * $qty;
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
                    <button type="button" class="btn btn-delite" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Kupi</button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <form method="post" action="{{ url('/checkout') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="ime">Ime</label>
                                            <input type="text" class="form-control" id="ime" name="ime" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prezime">Prezime</label>
                                            <input type="text" class="form-control" id="prezime" name="prezime" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Adresa</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="grad">Grad</label>
                                            <input type="text" class="form-control" id="grad" name="grad" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefon</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required>
                                        </div>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <span>Cijena : ${{$totalPrice}}</span>
                                            <button type="submit" class="btn btn-primary">Kupi</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        </div>
                    <!-- <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buyModalLabel">Unesite podatke za kupovinu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ url('/checkout') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="address">Adresa</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Telefon</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Kupi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->


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
