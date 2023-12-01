@extends('template.blank')
@section('content')
<div class="container">
    @include('partials.header')
    <a href="/user" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i> Back</a>
    <h4 class="my-4">History Pemesanan</h4>
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            <h1>{{ $loop->iteration }}</h1>
        </div>
        <div class="card-body">
            <p>Nama :{{ $item->nama}}</p>
            <p class="fs-4">No Telp :{{ $item->telp}}</p>
            <p class="fs-4">Total Pembayaran :Rp{{ number_format($item->total_pembayaran,0,'.',',')}}</p>
        </div>
        <div class="card-footer">
            <a href="{{ url('/history',$item->id) }}" class="btn btn-primary">Detail</a>
        </div>
    </div>
    @endforeach
</div>
@endsection