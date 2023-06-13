@extends('layouts.admin')

@section('content')
    <div class="container admmin-card p-0 p-sm-2">
        <div class="">
            <h1>Kategorije</h1>
        </div>
        <div class="" style="  max-width: 100%; overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Slika</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                        <tr class="p-5">
                            <th>{{$item->id}}</th>
                            <td class="h-2 w-2">
                                <img src="{{$item->image}}" class="img" alt="image">
                            </td>
                            <td>{{$item->name}}</td>

                            <td class="d-flex">
                                <a href="{{ url('edit-prod/'.$item->id) }}"  class="AddBtn p-1">Uredi</a>
                                <a href="{{ url('delete-category/'.$item->id) }}" class="AddBtn p-1 ">Izbriši</a>

                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
