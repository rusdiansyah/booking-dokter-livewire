<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoGrafis extends Model
{
    protected $fillable = [
        'judul',
        'gambar',
        'is_publish',
        'user_id',
    ];
}
