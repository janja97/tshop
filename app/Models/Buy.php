<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;

    protected $table='buy';
    protected $fillable =[
        'user_id',
        'prod_id',
        'prod_qty',
        'ime',
        'prezime',
        'adresa',
        'grad',
        'email',
        'telefon',
        'total_price',
    ];
}
