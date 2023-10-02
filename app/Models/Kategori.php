<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['namaKategori'];
    use HasFactory;

    public function barang()
    {
        return $this->hashMany(Barang::class);
    }

}