@extends('template.base')
@section('title','Lyra | Report')
@section('content')
<div class="card p-3">
    <h1 class="my-3">Report</h1>
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
                @forelse ($users as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}
                    <td>{{ $item->telp }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="" class="btn btn-primary">Detail</a></td>
                </tr>
                @empty
                <td>Tidak ada data pada tanggal tersebut</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection