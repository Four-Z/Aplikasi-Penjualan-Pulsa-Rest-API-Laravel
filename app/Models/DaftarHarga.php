<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHarga extends Model
{
    use HasFactory;

    protected $table = 'daftar_harga';
    protected $fillable = [
        'id',
        'id_provider',
        'harga',
        'updated_at',
        'created_at'
    ];
}
