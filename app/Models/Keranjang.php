<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $fillable = ['Nama', 'Jumlah', 'Total', 'Harga','id_user','Total_pembayaran'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function hapuskeranjang($userid){
        $this->where('id_user',$userid)->delete();  
    }
}