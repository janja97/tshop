@extends('layouts.front')

@section('title')
    welcome eshop
@endsection

@section('content')

<div class="col-12 baner">
    <h6 class="px-5 fw-bolder">Collections/ {{$category->name}}</h6>
</div>

<div class="container">
    <h2>{{$category->name}}</h2>
    <div class="row py-5">
    @if(count($products) > 1)
        @foreach($products as $prod)
            <div class="col-md-3">
                <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">

                    <div class="card p-3">
                        <img src="{{$prod->image}}" alt="" class="imgF">
                        <div class="card-body">
                            <h2>{{$prod->name}}</h2>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
    <div class="d-flex mx-5 justify-content-center flex-column">
        <h1 class="text-center mt-5">Dolazi uskoro</h1>
        <img src="{{asset('assets/image/coming-soon.png')}}" alt="shop" style="width:500px; height:500px;" class="mx-auto">
    </div>
    @endif

    </div>
</div>

@endsection
