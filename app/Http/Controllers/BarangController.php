<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('admin.databarang', compact(['data']));
    }

    public function create()
    {
        $data = Kategori::all();
        return view('admin.tambah', compact(['data']));

    }

    public function store(Request $request)
    {
        $reqdata = $request->all();
        $fileName = time() . $request->file('fotoBarang')->getClientOriginalName();
        $path = $request->file(('fotoBarang'))->storeAs('images', $fileName, 'public');
        $reqdata['fotoBarang'] = '/storage/' . $path;
        Barang::create($reqdata);
        return redirect()->route('barang.index')->with('success', 'berhasil menambahkan data');
    }

    public function show(Barang $barang)
    {
    }

    public function edit($id)
    {
        $makanan = Barang::find($id);
        $data = Kategori::all();
        return view('admin.edit', compact(['data', 'makanan']));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        if ($request->hasFile('fotoBarang')) {
            Storage::delete('public/' . $barang->fotoBarang);
            $fileName = time() . $request->file('fotoBarang')->getClientOriginalName();
            $path = $request->file('fotoBarang')->storeAs('images', $fileName, 'public');
            $barang->fotoBarang = '/storage/' . $path;
        }

        // Update data selain gambar
        $barang->fill($request->except('fotoBarang'));
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Berhasil memperbarui data');
    }

    public function destroy($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect()->route('barang.index')->with('success', 'berhasil menghapus data');
    }
}