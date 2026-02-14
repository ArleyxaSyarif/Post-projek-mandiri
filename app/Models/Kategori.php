<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'kategori',
    ];

    public function postingans()
    {
        return $this->hasMany(Postingan::class);
    }
}
