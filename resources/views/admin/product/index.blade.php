@extends('layouts.admin')

@section('content')
    <div class="container admmin-card">
        <div class="">
            <h1>Proizvodi</h1>
        </div>
        <div class="">
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
                            <img src="{{$item->image}}" class="w-50" alt="image" class="image">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>${{$item->original_price}}</td>
                        <td>${{$item->selling_price}}</td>
                        <td class="d-flex pt-5">
                            <a href="{{ url('edit-product/'.$item->id) }}" class="AddBtn">Uredi</a>
                            <a href="{{ url('delete-product/'.$item->id) }}" class="AddBtn">Izbriši</a>

                        </td>
                    </tr>

                @endforeach
            </tbody>
            </table>
        </div>
    </div>
@endsection
