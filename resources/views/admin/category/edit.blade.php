@extends('layouts.admin')

@section('content')
    <div class="container admmin-card">
        <div class="">
            <h4>Uredi kategoriju</h4>
        </div>
        <div class="">
            <form action="{{url ('update-category/'.$category->id) }}" method="POST" enctype="multipart/from-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Name:</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug:</label>
                        <input type="text" value="{{$category->slug}}"  class="form-control" name="slug">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description:</label>
                        <textarea name="description"  rows="10" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status:</label>
                        <input type="checkbox" {{$category->status =='1' ? 'checked':''}}   name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Popular:</label>
                        <input type="checkbox" {{$category->popular =='1' ? 'checked':''}}    name="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta title:</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta keywords</label>
                        <textarea name="meta_keywords"  rows="10" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta description</label>
                        <textarea name="meta_descript"  rows="10" class="form-control">{{$category->meta_descript}}</textarea>
                    </div>
                    @if($category->image)
                        <img src="{{$category->image}}" alt ="image" class="image"/>
                    @endif
                    <div class="col-md-12">
                        <input type="text" value="{{$category->image}}"  name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button class="AddBtn my-2" type="submit">Spremi promjenu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
