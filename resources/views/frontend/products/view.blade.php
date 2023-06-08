@extends('layouts.front')

@section('title')
    welcome eshop
@endsection

@section('content')
<div class="col-12 baner">
    <h6 class="px-5 fw-bolder">Collections/ {{$products->category->name}} / {{$products->name}}</h6>

</div>
<div class="container py-3">
    <div class="card product_data p-3">
        <div class="d-flex justify-content-between">
            <h4>{{$products->name}}</h4>
                <!-- @if($products->qty >0)
                        <label for="" class="stock">In stock</label>
                @else
                        <label for="" class="stock">out of stock</label>
                @endif -->
        </div>
        <img src="{{$products->image}}" alt="" class="col-5">
        <div>
            <p>{{$products->description}}</p>
            <div class="d-flex justify-content-between w-5">
                <h4>Original Price: <span class="text-decoration-line-through">${{$products->original_price}}</span></h4>
                <h4>Selling Price: ${{$products->selling_price}}</h4>
            </div>
        </div>

        <div>
            <!-- part21 -->
            <form action="/add_to_cart" method="POST" class=" d-flex align-items-center justify-content-between">
                @csrf
                <input type="hidden" value="{{$products->id}}" id="prod_id" name="product_id" >

               <div class="d-flex">
                    <label for="Quantity">Quantity:</label>

                    <div class="d-flex quantity col-4 mx-2">
                        <input type="button" onclick="decrementValue()" value="-" class="input-group-text" />
                        <!-- <input type="text" id="prod_qty" value="1" class="qty_input" name="prod_qty"/> -->
                        <!-- <input type="number" value="{{$products->id}}" name="product_qty"> -->
                        <input type="number" class="form-control" name="product_qty" value="1" id="qty">

                        <input type="button" onclick="incrementValue()" value="+" class="input-group-text"/>
                    </div>
               </div>
                    @csrf
                    <button class="AddBtn">Add to card</button>
            </form>
        </div>
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

