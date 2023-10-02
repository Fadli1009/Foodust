@extends('template.base')
@section('content')
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="card">

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
                    <h6 class="fw-semibold mb-0">Opsi</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                    </td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{ $item->namaKategori }}</h6>
                    </td>
                    <td class="border-bottom-0">
                        <div class="d-flex">
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning mx-2">Edit</a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection