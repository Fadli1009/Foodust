@extends('template.base')
@section('title','Lyra | Data Barang')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <h2 class="my-4">Data Makanan</h2>
    @foreach ($data as $item)
    <div class="col-md-4">
        <h5 class="card-title fw-semibold mb-4">Menu {{ $loop->iteration }}</h5>
        <div class="card @if ($item->stokBarang == 0)
            bg-danger
        @endif">
            <img src="{{ asset($item->fotoBarang) }}" class="card-img-top" height="300">
            <div class="card-body">
                <h5 class="card-title">Nama : {{ $item->namaBarang }}</h5>
                <h5 class="card-title">Harga : {{ number_format($item->hargaBarang,0,'.',',') }}</h5>
                <h5 class="card-title">Kategori : {{ $item->kategoriBarang }}</h5>
                <h5 class="card-title">Stok : {{ $item->stokBarang }}</h5>
                <div class="d-flex jusify-between mt-4">
                    <a href="{{ route('barang.edit',$item->id) }}" class="btn btn-warning mx-2">Edit</a>
                    <form action="{{ route('barang.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger @if ($item->stokBarang == 0)
                            bg-primary
                        @endif">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection