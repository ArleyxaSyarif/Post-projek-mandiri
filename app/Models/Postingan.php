<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($postingan) {
            $postingan->slug = Str::slug($postingan->judul);
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
