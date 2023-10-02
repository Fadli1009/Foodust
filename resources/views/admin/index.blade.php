@extends('template.base')
@section('title','Lyra | Admin')
@section('content')
<div class="row">
    <div class="card" style="width: 25rem">
        <div class="card-body col">
            <div class="lead">Total Makanan</div>
            <h2 class="card-title">{{ $ttldata }}</h2>
            <p class="small text-muted">Total makanan yang ada tersedia</p>
        </div>
    </div>
    <div class="card col-md-6 col-md-12 mx-auto" style="width: 25rem">
        <div class="card-body ">
            <div class="lead">Total Ketegori</div>
            <h2 class="card-title">{{ $ttlcategory }}</h2>
            <p class="small text-muted">Total kategori makanan</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch w-100">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Makanan</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama Makanan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Kategori Makanan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Stok Makanan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Harga Makanan</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($makananTable as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $item->namaBarang }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $item->category ? $item->category->namaKategori : 'Gaada Kategori' }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-primary rounded-3 fw-semibold">{{ $item->stokBarang }}</span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 fs-4">Rp. {{ $item->hargaBarang }}</h6>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <h3>Data Makanan</h3>
    @foreach ($makanan as $item)
        
    <div class="col-sm-6 col-xl-3">
        <div class="card overflow-hidden rounded-2">
            <div class="position-relative">
                <a href="javascript:void(0)"><img src="{{ asset($item->fotoBarang) }}" class="card-img-top rounded-0"
                        alt="..." height="300"></a>
                <a href="javascript:void(0)"
                    class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i
                        class="ti ti-basket fs-4"></i></a>
            </div>
            <div class="card-body pt-3 p-4">
                <h6 class="fw-semibold fs-4">{{ $item->namaBarang }}</h6>
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">Rp. {{ $item->hargaBarang }}</h6>
                    <ul class="list-unstyled d-flex align-items-center mb-0">
                        <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Lihat makanan lebih lengkap</a>
    
</div>
@endsection