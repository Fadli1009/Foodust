@extends('template.blank')
@section('title','Lyra | Home')
@section('content')
<div class="container">
    @include('partials.header')
    <div class="row mt-3">
        <form action="/carimenu" method="get">
            <div class="input-group input-group-lg">
                <input type="search" class="form-control" placeholder="Search" name="cari">
                <button type="submit" class="btn btn-primary"><i class="ti ti-search fs-4"></i></button>
            </div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li style="list-style: circle; margin-left: 10px">{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <h3 class="my-3 mt-5">Data Makanan</h3>
        @foreach ($makanan as $item)
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <h5 class="my-4 ps-2">Menu {{ $loop->iteration }}</h5>
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset($item->fotoBarang) }}"
                            class="card-img-top rounded-0" alt="..." height="300"></a>
                    @if ($item->stokBarang >0)
                    <a href="{{ url('/user/keranjang',$item->id) }}"
                        class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3 border-0"><i
                            class="ti ti-basket fs-4"></i>
                    </a>
                    @endif
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">{{ $item->namaBarang }}</h6>
                    <h6 class="fw-semibold fs-4">Stok :{{ $item->stokBarang }}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. {{ number_format($item->hargaBarang,0,'.',',') }}</h6>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection