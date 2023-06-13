@extends('layouts.admin')

@section('content')
    <div class="container admmin-card">
        <div class="">
            <h4>Add product</h4>
        </div>
        <div class="">
            <form action="{{url ('insert-product') }}" method="POST" enctype="multipart/from-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <select name="cate_id" id="" class="form-select" aria-label="default select example">
                            <option value="">Select cstegory</option>
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug:</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Small-Description:</label>
                        <textarea name="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description:</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original price:</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Seling prica:</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>

                    <div class="col-md-6">
                        <label for="">Qty:</label>
                        <input type="number" class="form-control" name="qty">
                    </div> <div class="col-md-6">
                        <label for="">Tax:</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6">
                        <label for="">Status:</label>
                        <input type="checkbox"  name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">trending:</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-12">
                        <label for="">Image</label>
                        <input type="text" name="image" class="form-control">
                    </div>



                    <div class="col-md-12">
                        <button class="AddBtn mt-5" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
