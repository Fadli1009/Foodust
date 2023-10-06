@extends('template.blank')
@section('title','Lyra | Keranjang')
@section('content')
<div class="container-fluid">
  @include('partials.headerblank')
  <a href="/user" class="btn btn-primary mb-3">Back</a>
  @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
  <h3 class="my-5">Data Cart</h3>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Makanan</th>
          <th>Harga</th>
          <th>Total</th>
          <th>Jumalah</th>
          <th>Hapus</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->Nama }}</td>
          <td>{{ $item->Harga }}</td>
          <td>{{ $item->Total }}</td>
          <td>Rp {{ number_format($item->Jumlah,0,'.',',') }}</td>
          <td><a href="/keranjang/{{ $item->id }}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                  d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                  stroke-width="0" fill="currentColor"></path>
                <path
                  d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                  stroke-width="0" fill="currentColor"></path>
              </svg>
            </a></td>
            @empty
            <td colspan="6" class="text-center">Keranjang Kosong</td>
          </tr>
        @endforelse
        <tr class="bg-primary text-light">
          <td colspan="5" class="fs-5 fw-bolder">Total</td>
          <td class="fs-3 fw-bolder">Rp {{ $rupiah }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection