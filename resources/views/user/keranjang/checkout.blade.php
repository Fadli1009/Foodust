@extends('template.blank')
@section('title','Lyra | Checkout')
@section('content')
<div class="container-fluid">
    @include('partials.headerblank')
    <h1 class="mb-3">Checkout</h1>
    <a href="/keranjang" class="btn btn-primary mb-3"><i class="ti ti-arrow-left"></i> Back</a>
    <div class="container">
        <div class="row my-5 d-flex justify-content-between">
            <div class="col-lg-7 mr-5 card p-4">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="list-style: circle; margin-left: 10px">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url('/keranjang/checkout/verify') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control mt-3" id="nama" name="nama"
                            value="{{ Session::get('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama">No Hp</label>
                        <input type="number" class="form-control mt-3" id="nama" name="telp"
                            value="{{ Session::get('telp') }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama">Alamat</label>
                        <textarea name="alamat" class="form-control mt-3" id="" cols="30" rows="10">{{
                            Session::get('alamat') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama">Bayar Disini :</label> seharga
                        @if (session('warning'))
                        <p class="text-danger">{{ session('warning')}}</p>
                        @endif
                        <input type="number" class="form-control mt-3" id="nama" name="total_pembayaran" id="bayar"
                            value="{{ Session::get('total_pembayaran') }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <button class="btn btn-primary" id='tombol1' type="submit">Buat
                            Pesanan</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 card p-4 overflow-y-scroll">
                <h4 class="mb-4">Pesanan Anda</h4>
                @foreach ($data as $item)
                <div class="item d-flex align-items-center justify-content-between mb-4">
                    <h6>{{ $item->Nama }} <span class="ms-2 text-secondary">x{{ $item->Total }}</span></h6>
                    <span id="harga">Rp.{{ number_format($item->Jumlah, 0,'.','.') }}</span>
                </div>
                @endforeach
                <h6>Total Pesanan: <span class="ms-2 text-danger">Rp.{{ $rupiah }}</span></h6>
            </div>
        </div>
    </div>
</div>
@endsection