<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'kategori_berita_id',
        'judul',
        'isi',
        'gambar',
        'is_publish',
        'user_id',
    ];

    public function kategori_berita()
    {
        return $this->belongsTo(KategoriBerita::class);
    }
}
