<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['namaBarang', 'hargaBarang', 'stokBarang', 'kategoriBarang', 'fotoBarang'];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Kategori::class);
    }
}