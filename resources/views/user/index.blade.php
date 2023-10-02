@extends('template.blank')
@section('title','Lyra | Home')
@section('content')

<div class="container">
    @include('partials.header')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/barang/{id}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Makanan</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name='hargaBarang' disabled value="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Harga Makanan</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name='hargaBarang' disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Total Pembelian</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name='hargaBarang'>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Total Harga</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" name='hargaBarang' disabled>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($makanan as $item)
        <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="{{ asset($item->fotoBarang) }}"
                            class="card-img-top rounded-0" alt="..." height="300"></a>
                    <a href="{{ url('/user/barang/ $item->id')  }}}}"
                        class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3 border-0"
                        data-toggle="modal" data-target="#exampleModal"><i class="ti ti-basket fs-4"></i>
                    </a>
                </div>
                <div class="card-body pt-3 p-4">
                    <h6 class="fw-semibold fs-4">{{ $item->namaBarang }}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. {{ $item->hargaBarang }}</h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                            </li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                            </li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                            </li>
                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                            </li>
                            <li><a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection