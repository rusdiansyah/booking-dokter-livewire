<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = [
        'nama',
        'gambar',
        'keterangan',
        'is_active',
    ];
}
