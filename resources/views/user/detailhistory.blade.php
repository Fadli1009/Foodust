@extends('template.blank')
@section('content')
<div class="container">
    @include('partials.header')
    <a href="/user/history" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i> Back</a>
    <h4 class="my-4">History Pemesanan</h4>
    <div class="card">
        <div class="card-body">
            <p>Dipesan pada <b>{{ $tanggal }}</b></p>
            @foreach ($keranjang as $item)
            <ul class="list-group mb-3">
                <li class="list-group-item">{{ $item->Nama}} x {{ $item->Total}} = Rp. {{
                    number_format($item->Jumlah,0,'.',',') }}</li>
            </ul>
            @endforeach
            <p><b>Total Pemesanan :Rp {{ number_format($jumlahkan,0,'.',',') }}</b></p>
            <p><b>LUNAS</b></p>
        </div>
    </div>
</div>
@endsection