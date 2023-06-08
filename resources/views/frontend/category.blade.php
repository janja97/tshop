@extends('layouts.front')

@section('title')
    welcome eshop
@endsection

@section('content')
@include('layouts.inc.slider')


<div class="py-5 container">
    <h1>Kategorije</h1>
    <div class="container row">
        @foreach($category as $cate)
        <div class="col-md-3 mt-2">
            <a href="{{url('view-category/'.$cate->slug)}}">
                <div class="card p-3" style="height:350px;">
                    <img src="{{$cate->image}}" alt="" class="imgF">
                    <div class="card-body">
                        <h2 class="position-absolute" style="bottom:20px;">{{$cate->name}}</h2>
                        <!-- <p>
                            {{$cate->description}}
                        </p> -->
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
  </div>
@endsection
