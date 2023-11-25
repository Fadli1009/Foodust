<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUser extends Model
{
    use HasFactory;
    protected $table = 'data_users';
    protected $fillable = ['nama', 'telp', 'alamat', 'total_pembayaran','id_user'];
    public function getCreatedAtAttribute()
        {
            return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
        }
    
}