<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    function show(
        $id,
        Request $request
    ) {
        $data = Barang::find($id);
        if ($data) {
            $input1 = $data->hargaBarang;
            $input2 = $request->input('ttlpembelian');
            $res = $input1 * $input2;
            return view('user.keranjang.addcart', compact(['data', 'res']));
        } else {
            return redirect('/user');
        }
    }
    function showFood()
    {
        $makanan = Barang::all();
        return view('user.index', compact(['makanan']));

    }
    function hitung(Request $request, $id)
    {
        $data = Barang::find($id);
        $val = $request->validate([
            'ttlpembelian' => 'required|integer'
        ]);
        $input1 = $data->hargaBarang;
        $input2 = $request->input('ttlpembelian');
        $res = $input1 * $input2;
        return view('user.keranjang.addcart', compact(['res', 'data']));
    }
    public function create(Request $request)
    {
        // dd($request->all());s
    }
}