<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;


    protected $table = 'penjualan';
    protected $fillable = [
        'id',
        'no_hp',
        'harga',
        'tanggal_pembelian'
    ];

    public $timestamps = false;
}
