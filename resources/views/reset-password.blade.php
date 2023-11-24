@extends("template.blank")
@section('title','Lyra | Forgot Password')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="/login" class="btn btn-primary my-4"><i class="ti ti-arrow-left"></i> Back</a>

                            <form action="{{ route('password.update') }}" method="post">
                                @csrf
                                <h4 class="my-3">Reset Password</h4>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li style="list-style: circle; margin-left: 10px">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session()->has('status'))
                                <div class="alert alert-success">
                                    {{ session()->get('status') }}
                                </div>
                                @endif
                                <div class="mb-3">
                                    <input type="hidden" value="{{ request()->token }}" name="token">
                                    <input type="hidden" value="{{ request()->email }}" name="email">
                                    <label for="password" class="form-label">Password :</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Masukan Password baru anda" autocomplete="additional-name"
                                        name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="email"
                                        placeholder="Masukan konfirmasi password anda" autocomplete="additional-name"
                                        name="password_confirmation">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Ganti Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection