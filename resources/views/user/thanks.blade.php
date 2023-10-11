@extends('template.blank')
@section('title','Lyra | Thank You For Order :)')
@section('content')
    <div class="container-fluid">
        @include('partials.headerblank')
        <a href="/user" class="btn btn-primary">&leftarrow;Back</a>
        <div class="d-flex align-items-center justify-content-center text-center" style="height:100vh">
            <div class="item">
                <h1>Terima Kasih telah memesan makanan kami</h1>
                <h4>Makanan Anda akan dikirim dengan kurir kami, Harap tunggu yaaaa</h4>
                <a href="{{ url('/keranjang/checkout/print') }}" target="_blank" class="btn btn-primary mt-4">Cetak Laporan</a>
            </div>
        </div>
    </div>
@endsection