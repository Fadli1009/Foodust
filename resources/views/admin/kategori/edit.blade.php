@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Kategori</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kategori.update', $data->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name='namaKategori' value="{{ $data->namaKategori }}">
                    </div>        
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
        @endsection