<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    function show(
        $id,
        Request $request
    ) {
        $data = Barang::find($id);
        return view('user.keranjang.addcart', compact(['data']));
    }
    function showFood()
    {
        $makanan = Barang::all();
        return view('user.index', compact(['makanan']));

    }
    public function create(Request $request)
    {
        $val = $request->validate([
            'Nama' => 'required',
            'Harga' => 'required',
            'Jumlah' => 'required',
            'Total' => 'required'
        ]);
        Keranjang::create($val);
        return redirect('/user')->with('success', 'Berhasil ditambahkan ke keranjang');
    }
}