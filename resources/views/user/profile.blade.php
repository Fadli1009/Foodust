@extends('template.blank')
@section('content')
@include('partials.header')
<div class="card">
    <div class="card-header">
        <h1>profile</h1>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ url('/user/profile/upload') }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ganti Password</label>
                <input type="password" class="form-control" placeholder="Ganti Password" name="password"
                    name="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ganti</button>
            </div>
        </form>
    </div>
</div>
@endsection