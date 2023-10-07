@extends('template.blank')
@section('content')
<div class="container-fluid">
    @include('partials.headerblank')
    <h1 class="mb-3">Checkout</h1>
    <a href="/keranjang" class="btn btn-primary mb-3">&leftarrow;  Back</a>
    <div class="container">
        <div class="row my-5 d-flex justify-content-between">
            <div class="col-lg-7 mr-5 card p-4">
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control mt-3" id="nama" name="nama" >
                    </div>
                    <div class="mb-3">
                        <label for="nama">No Hp</label>
                        <input type="number" class="form-control mt-3" id="nama" name="telp">
                    </div>
                    <div class="mb-3">
                        <label for="nama">Alamat</label>
                        <textarea name="alamat" class="form-control mt-3" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nama">Metode Pembayaran</label>
                        <input type="text" class="form-control mt-3" id="nama" name="pembayaran" value="COD" readonly>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Cetak</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 card p-4 overflow-y-scroll">
                <h4 class="mb-4">Pesanan Anda</h4>
                @foreach ($data as $item)    
                    <div class="item d-flex align-items-center justify-content-between mb-4">
                        <h6>{{ $item->Nama }} <span class="ms-2 text-secondary">x{{ $item->Total }}</span></h6>
                        <span>Rp.{{ number_format($item->Jumlah, 0,'.','.') }}</span>
                    </div>
                @endforeach
                <h6>Total Pesanan: <span class="ms-2 text-danger">Rp.{{ $rupiah }}</span></h6>
            </div>
        </div>
    </div>
</div>
@endsection