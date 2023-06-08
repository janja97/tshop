@extends('layouts.admin')

@section('content')
    <div class="container admmin-card" >
        <div class="py-3">
            <h4>Dodaj kategoriju</h4>
        </div>
        <div class="">
            <form action="{{url ('insert-category') }}" method="POST" enctype="multipart/from-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug:</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description:</label>
                        <textarea name="description" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status:</label>
                        <input type="checkbox"  name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular:</label>
                        <input type="checkbox" name="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta title:</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta description</label>
                        <textarea name="meta_descript" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Image</label>
                        <input type="text" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mt-2">
                        <button class="AddBtn" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
