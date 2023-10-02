@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tambah Kategori</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name='namaKategori'>
                    </div>        
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
        @endsection