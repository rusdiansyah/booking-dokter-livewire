<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'keterangan',
        'foto',
    ];
}
