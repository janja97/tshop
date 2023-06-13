<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buy;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index()
    {
        $proizvodi = Buy::select('prod_id', DB::raw('SUM(prod_qty) as total_qty'))
        ->groupBy('prod_id')
        ->orderByDesc('total_qty')
        ->get();

    $proizvodi->transform(function ($item) {
        $product = Product::find($item->prod_id);

        $item->prod_id = $product;

        return $item;
    });

    return view('admin.index', compact('proizvodi'));

    }
}
