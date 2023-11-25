@extends('template.base')
@section('title','Detai Report')
@section('content')
<a href="/report" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i> Back</a>
<div class="card p-3">
    <h3 class="mb-3">Detail Report</h3>
    <p class="fs-4">Dipesan pada<strong> {{ $keranjang->first()->created_at }}</strong></p>
    <p class="fs-4">Nama<strong> {{ $user->nama }}</strong></p>
    <p class="fs-4">No Telp<strong> {{ $user->telp }}</strong></p>
    <p><strong>Menu : </strong></p>
    @foreach ($keranjang as $item)
    <ol class="list-group mb-3">
        <li class="list-group-item mb-2">{{
            number_format($item->Harga,0,'.',',') }}<br>{{ $item->Nama }} <span class="text-primary">x{{ $item->Total}}
                ={{ number_format($item->Jumlah,0,'.',',') }}
            </span></li>
    </ol>
    @endforeach
    <div class="text-end">
        <h4>Total harga : <span class="text-danger">{{ number_format($ttlharga,0,'.',',') }}</span></h4>
        <p>Total Bayar : <span class="text-primary">{{ number_format($ttlbayar->Total_pembayaran,0,'.',',') }}</span>
        </p>
        <p>Total Kembalian : <span class="text-bold">{{ number_format($kembalian,0,'.',',') }}</span>
    </div>
    </p>
    <p>Alamat : {{ $user->alamat }}</p>
    <h4>Status : <span class="text-primary">LUNAS</span></h4>
</div>
@endsection