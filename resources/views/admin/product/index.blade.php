@extends('layouts.admin')

@section('content')
    <div class="container admmin-card p-0 p-sm-2">
        <div class="">
            <h1>Proizvodi</h1>
        </div>
        <div class="" style="overflow-x: auto; white-space: nowrap;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Description</th>
                    <th scope="col">Originalna cijena</th>
                    <th scope="col">Cijena sa popustom</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <td>
                                <img src="{{$item->image}}"  alt="image" class="image" style="width:150px;">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td class="description">{{$item->description}}</td>
                            <td>${{$item->original_price}}</td>
                            <td>${{$item->selling_price}}</td>
                            <td class="pt-5">
                                <a href="{{ url('edit-product/'.$item->id) }}" class="AddBtn mt-1">Uredi</a>
                                <a href="{{ url('delete-product/'.$item->id) }}" class="AddBtn">Izbriši</a>

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
