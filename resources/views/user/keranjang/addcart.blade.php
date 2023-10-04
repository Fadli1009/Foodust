@extends('template.blank')
@section('content')
<div class="container">
    @include('partials.header')
    <div class="card p-3">
        <h3 class="my-4">Keranjang</h3>
        <form action="{{ url('/user/keranjang/masuk') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name='namaBarang' disabled
                    value="{{ $data->namaBarang }}">
            </div>
            <form action="{{ url('/user/keranjang',$data->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Harga Makanan</label>
                    <input type="number" class="form-control" id="hargaMakanan" name='hargaBarang' disabled
                        value="{{$data->hargaBarang }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Total Pembelian</label>
                    <input type="number" class="form-control" id="totalHarga" name='ttlpembelian' value="">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" onclick="klik()">Hitung</button>
                </div>
            </form>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="ttlharga" name='ttlharga' disabled value="{{ $res }}">
            </div>
            <div class="modal-footer">
                <a href="{{ route('keranjang.create') }}" class="btn btn-primary">Masukan Keranjang</a>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('totalHarga').addEventListener('input', function() {
    document.cookie = "totalHarga=" + this.value + "; path=/";
});
document.addEventListener('DOMContentLoaded', function() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim().split('=');
        if (cookie[0] === 'totalHarga') {
            document.getElementById('totalHarga').value = cookie[1];
            break;
        }
    }
});
</script>
@endsection