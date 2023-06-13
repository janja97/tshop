@extends('layouts.front')

@section('title')
    welcome eshop
@endsection

@section('content')
  @include('layouts.inc.slider')

  <div class="container">
    <div class="py-5">
        <h1>Popularni proizvodi</h3>
        <div class="container row">
            @foreach($featured_products as $prod)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                   <a href="{{url('view-product/'.$prod->slug)}}">
                    <div class="card p-3 product">
                            <img src="{{$prod->image}}" alt="" class="imgF">
                            <div class="card-body">
                                <h3>{{$prod->name}}</h3>
                                <p class="description-card">{{$prod->small_description }}</p>
                                <div class="d-flex">
                                    <h5>Price:</h5>
                                    <h5 class="mx-1 text-decoration-line-through">{{$prod->original_price}}$</h5>
                                    <h5 class="mx-2">{{$prod->selling_price}}$</h5>
                                </div>
                            </div>
                        </div>
                   </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="py-5">
        <h1>Kategorije</h1>
        <div class="container row">
        @foreach($tranding_category as $cate)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2 ">
                <a href="{{url('view-category/'.$cate->slug)}}">
                    <div class="p-3 card mx-auto" style="height:300px !important;">
                        <img src="{{$cate->image}}" alt="" class="imgF">
                        <div class="card-body">
                        <h3 class="text-center">{{$cate->name}}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
  </div>
@endsection
