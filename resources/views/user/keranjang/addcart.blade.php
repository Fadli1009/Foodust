@extends('template.blank')
@section('title','Lyra | Cart')
@section('content')
<div class="container-fluid">
    @include('partials.header')
    @if (session('failed'))
    <div class="alert alert-danger">
        {{ session('failed') }}
    </div>
    @endif
    <div class="card p-3">
        <h3 class="my-4">Keranjang</h3>
        <p class="text-danger fw-bolder">Sebelum menambahkan ke keranjang, klik tombol 'tambah' untuk mengetahui
            harga
            nya*</p>
        <form action="{{ url('/user/keranjang/masuk') }}" method="post">
            @csrf
            @method('post')
            <input type="hidden" value="{{ Auth::user()->id }}" name="id_user">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name='Nama' readonly
                    value="{{ $data->namaBarang }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga Makanan</label>
                <input type="number" class="form-control" id="hargaMakanan" name='Harga' readonly
                    value="{{$data->hargaBarang }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Total Pembelian</label>
                <input type="number" class="form-control" id="totalHarga" name='Total' value="">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stok Makanan</label>
                <input type="number" class="form-control" id="hargaMakanan" name='stok' readonly
                    value="{{$data->stokBarang }}">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" onclick="tambah()" type="button">Tambah</button>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Total Harga</label>
                <input type="number" class="form-control" id="ttlharga" name='Jumlah' readonly>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Masukan Keranjang</button>
            </div>
        </form>
    </div>
</div>
<script>
    function tambah(){
    event.preventDefault()
    var input1 = parseInt(document.getElementById('hargaMakanan').value)
    var input2 = parseInt(document.getElementById('totalHarga').value)
    var hasil = document.getElementById('ttlharga')

    if(!isNaN(input1) && !isNaN(input2)){
        var hasilkali = input1 * input2
        hasil.value = hasilkali
    }else{
        hasil.value = 'data tidak ditemukan'
    }
}
</script>
@endsection