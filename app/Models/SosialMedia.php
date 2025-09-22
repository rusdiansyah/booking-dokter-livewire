<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $fillable = [
        'nama',
        'icon',
        'url',
        'aktif',
    ];
}
