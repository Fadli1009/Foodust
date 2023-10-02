@extends('template.base')
@section('title','Lyra | Edit Barang')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Menu</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('barang.update', $makanan->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name='namaBarang' value="{{ $makanan->namaBarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Harga Menu</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name='hargaBarang' value="{{  $makanan->hargaBarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="select" class="form-label">Kategori Menu</label>
                        <select class="form-select" aria-label="Default select example" id="select" name="kategoriBarang">
                            @foreach ($data as $item)
                            <option selected>Pilih Kategori Menu</option>
                            <option value="{{ $item->id }}">{{ $item->namaKategori }}</option>
                            @endforeach
                    
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Menu</label>
                        <input type="number" class="form-control" id="stok" name='stokBarang'  value="{{  $makanan->stokBarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Product</label>
                        <input class="form-control" type="file" id="fotoBarang" name="fotoBarang">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
        @endsection