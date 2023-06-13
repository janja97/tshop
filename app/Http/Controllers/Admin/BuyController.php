<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class BuyController extends Controller
{
    //public function index()
    public function index()
    {
        $proizvodi = Buy::all();

        return view('admin.dashboard', ['proizvodi' => $proizvodi]);
    }
}



 