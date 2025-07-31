<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'poli_id',
        'nama',
        'gambar',
        'keterangan',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
