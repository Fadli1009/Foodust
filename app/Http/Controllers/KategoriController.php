<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact(['data']));
        //
    }
    public function create()
    {
        return view('admin.kategori.tambah');
    }

    public function store(Request $request)
    {
        $val = $request->validate([
            'namaKategori' => 'required'
        ]);

        Kategori::create($val);
        return redirect()->route('kategori.index')->with('success', 'Berhasil menambahkan kategori baru !');
    }

    public function show(Kategori $kategori)
    {
        //
    }
    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('admin.kategori.edit', compact(['data']));
    }
    public function update(Request $request, Kategori $kategori)
    {
        $val = $request->validate([
            'namaKategori' => 'required'
        ]);
        $kategori->update($val);
        return redirect()->route('kategori.index')->with('success', 'Berhasil mengedit kategori menu');
    }
    public function destroy($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        return redirect()->route('kategori.index')->with('success', 'Berhasil menghapus kategori menu');
    }
}