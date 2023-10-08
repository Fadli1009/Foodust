<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lyra</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/lyrapp.png') }}" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <div class="page-wrapper container" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('partials.headerblank')
    <div class="row">
      @foreach ($barang as $item)
      <div class="col-md-4">
        <div class="card pt-4">
          <h5 class="card-title fw-semibold mb-4">Menu {{ $loop->iteration }}</h5>
          <img src="{{ asset($item->fotoBarang) }}" class="card-img-top" height="300">
          <div class="card-body">
            <h5 class="card-title">Nama : {{ $item->namaBarang }}</h5>
            <h5 class="card-title">Harga : {{ number_format($item->hargaBarang, 0,'.',',') }}</h5>
            <h5 class="card-title">Kategori : {{ $item->kategoriBarang }}</h5>
            <h5 class="card-title">Stok : {{ $item->stokBarang }}</h5>
            <a href="/user" class="btn btn-primary my-3">Beli</a>
          </div>
        </div>
      </div>
      @endforeach
      <a href="{{ route('barang.index') }}" class="btn btn-secondary">Lihat makanan lebih lengkap</a>
    </div>
    @include('partials.footer')
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>