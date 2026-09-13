<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'status',
    ];

    // Relasi ke semua gambar berita
    public function images(): HasMany
    {
        return $this->hasMany(BeritaImage::class);
    }

    // Relasi khusus gambar utama (thumbnail)
    public function primaryImage(): HasOne
    {
        return $this->hasOne(BeritaImage::class)->where('is_primary', true);
    }
}