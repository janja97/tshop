@extends('layouts.admin')

@section('content')
    <div class="container admmin-card">
        <div class="">
            <h4>Add product</h4>
        </div>
        <div class="">
            <form action="{{url ('update-product/'.$products->id) }}" method="POST" enctype="multipart/from-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <select name="cate_id" id="" class="form-select" aria-label="default select example">
                            <option value="">{{$products->category->name}}</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug:</label>
                        <input type="text" class="form-control" name="slug" value="{{$products->slug}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Small-Description:</label>
                        <textarea name="small_description" rows="3" class="form-control">{{$products->small_description}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description:</label>
                        <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original price:</label>
                        <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Seling prica:</label>
                        <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Qty:</label>
                        <input type="number" class="form-control" name="qty" value="{{$products->qty}}">
                    </div> <div class="col-md-6">
                        <label for="">Tax:</label>
                        <input type="number" class="form-control" name="tax" value="{{$products->tax}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Status:</label>
                        <input type="checkbox"  name="status" {{$products->status=='1' ? 'checked' : ''}}>
                    </div>
                    <div class="col-md-6">
                        <label for="">trending:</label>
                        <input type="checkbox" name="trending" {{$products->trending=='1' ? 'checked' : ''}}>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta title:</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                    </div>
                    @if($products->image)
                        <img src="{{$products->image}}" alt="" class="image">
                        @endif
                    <div class="col-md-12">
                        Slika:
                        <input type="text" name="image" class="form-control" value="{{$products->image}}">
                    </div>



                    <div class="col-md-12">
                        <button class="AddBtn mt-2" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
