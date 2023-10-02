<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    function index($id)
    {
        dd(Barang::find($id));
        $makanan = Barang::find($id);
        dd($makanan);
    }
}