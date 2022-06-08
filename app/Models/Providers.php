<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class providers extends Model
{
    use HasFactory;

    protected $table = 'providers';
    protected $fillable = [
        'nama',
        'paket_1',
        'paket_2',
        'paket_3',
        'paket_4',
        'created_at',
        'updated_at'
    ];
}
