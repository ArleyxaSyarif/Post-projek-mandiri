<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    protected $fillable = [
       'judul',
       'gambar',
       'deskripsi',
       'slug',
       'penulis',
       'kategori_id',
       'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
