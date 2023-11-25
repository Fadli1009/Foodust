@extends('template.base')
@section('title','Lyra | Report')
@section('content')
<div class="card p-3">
  <h1 class="my-3">Report</h1>
  <form action="{{ route('filter.report') }}" method="get">
    <div class="d-flex my-4 justify-content-between">
      <div class="me-3">
        <label for="start" class="form-lable">Start Dari</label>
        <input type="date" class="form-control " id="start" name="startFilter">
      </div>
      <div class="me-3">
        <label for="end" class="form-lable">Sampai Dari</label>
        <input type="date" class="form-control" id="end" name="endFilter">
      </div>
      <button type="submit" class="btn btn-primary ms-3">Cari</button>
    </div>
  </form>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">No Telp</th>
          <th scope="col">Alamat</th>
          <th scope="col">Di pesan pada</th>
          <th scope="col">Detail</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->nama }}
          <td>{{ $item->telp }}</td>
          <td>{{ $item->alamat }}</td>
          <td>{{ $item->created_at }}</td>
          <td><a href="{{ url('/detail',$item->id) }}" class="btn btn-primary">Detail</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@endsection