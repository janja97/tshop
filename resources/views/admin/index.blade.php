@extends('layouts.admin')

@section('content')
    <div class="">
        <h1>
            Admindasboard
        </h1>
    </div>
    @if (count($proizvodi) > 0)
        <div class="">
            <div class="d-flex">
                <p>Ukupna zarada :</p>
                <span class="ml-1">
                    @php
                        $ukupnaZarada = 0;
                        foreach ($proizvodi as $proizvod) {
                            $ukupnaZarada += $proizvod->prod_id['selling_price'] * $proizvod->total_qty;
                        }
                        echo number_format($ukupnaZarada, 2) . ' $';
                    @endphp
                </span>
            </div>
            <div class="admin">
                <div class="table-container mt-3">
                    <table>
                        <thead>
                            <tr>
                                <th>Slika</th>
                                <th>Naziv</th>
                                <th>Cijena</th>
                                <th>Količina</th>
                                <th>Zarada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proizvodi as $proizvod)
                                <tr>
                                    <td><img src="{{ $proizvod->prod_id['image'] }}" alt="Proizvod slika"></td>
                                    <td>{{ $proizvod->prod_id['name'] }}</td>
                                    <td>{{ $proizvod->prod_id['selling_price'] }}</td>
                                    <td>{{ $proizvod->total_qty }}</td>
                                    <td>{{ $proizvod->prod_id['selling_price'] * $proizvod->total_qty }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="">
            <img src="{{ asset('assets/image/welcome-back.png') }}" alt="shop" style="width:300px; height:300px;" class="mx-auto d-flex justify-content-center mt-5">
        </div>
    @endif
@endsection
