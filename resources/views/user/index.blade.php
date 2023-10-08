@extends('template.blank')
@section('title','Lyra | Home')
@section('content')
<div class="container-fluid">
    @include('partials.header')    
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row mt-3">
        <h3 class="my-3">Data Makanan</h3>
        @foreach ($makanan as $item)
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset($item->fotoBarang) }}"
                            class="card-img-top rounded-0" alt="..." height="300"></a>
                    <a href="{{ url('/user/keranjang',$item->id) }}"
                        class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3 border-0"
                        ><i class="ti ti-basket fs-4"></i>
                    </a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">{{ $item->namaBarang }}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. {{ $item->hargaBarang }}</h6>
                
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection