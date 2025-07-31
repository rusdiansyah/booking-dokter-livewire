<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    protected $fillable = [
        'dokter_id',
        'poli_id',
        'hari',
        'pukul',
        'isActive',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
