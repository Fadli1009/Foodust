@extends('template.blank')
@section('title','Lyra | Forgot Password')
@section('content')
@include('partials.header')
<a href="/login" class="btn btn-primary mx-3"><i class="ti ti-arrow-left"></i> Back</a>
<div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
    <div class="card w-50 p-4">
        <form action="" method="post">
            @csrf
            <h4 class="my-3">Forgot Password</h4>
            <div class="mb-3">
                <label for="email" class="form-label">Email : </label>
                <input type="email" class="form-control" id="email" placeholder="Masukan email anda"
                    autocomplete="additional-name">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Kirimkan Link</button>
            </div>
        </form>
    </div>
</div>
@endsection