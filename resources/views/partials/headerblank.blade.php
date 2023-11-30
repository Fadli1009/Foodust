<nav class="navbar navbar-expand-lg navbar-light">

  <div class="navbar-collapse justify-content-end px-0 d-flex"" id=" navbarNav">
    <h2>LyraFood</h2>
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
          aria-expanded="false">
          <button class="btn btn-dark fs-2">Menu <i class="ti ti-arrow-down"></i></button>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            @auth
            <a href="" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">My Profile</p>
            </a>
            @if(Auth::user() && Auth::user()->role == "user")
            <a href="{{ url('/keranjang') }}" class="d-flex align-items-center gap-2 dropdown-item position-relative">
              <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary fs-1">
                @inject('keranjang','App\Models\Keranjang')
                {{ count($keranjang::where('id_user',Auth::user()->id)->get()) }}
              </span>
              <i class="ti ti-garden-cart"></i>
              <p class="mb-0 fs-3">Keranjang</p>
            </a>
            @inject('keranjang','App\Models\Keranjang')
            @php
            $data = $keranjang->where('id_user', Auth::user()->id)->count();
            @endphp
            @endif
            @endauth
            @guest
            <a href="/login" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">Login</p>
            </a>
            <a href="/registrasi" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">Register</p>
            </a>
            @endguest
            @auth
            <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            @endauth
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>