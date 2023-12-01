<nav class="navbar navbar-expand-lg navbar-light">
  <ul class="navbar-nav">
    @auth
    @if(Auth::user() && Auth::user()->role=='admin')
    <li class="nav-item d-block d-xl-none">
      <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    @endif
    @endauth
  </ul>
  <div class="navbar-collapse justify-content-end px-0 d-flex" id="navbarNav">
    @if (Auth::user() && Auth::user()->role == 'user')
    <h2>LyraFood</h2>
    @endif
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
          aria-expanded="false">
          {{-- <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle"> --}}
          <span class="text-primary fs-3">@if (Auth()->check())
            {{Auth::user()->name }}
            @endif &downarrow;</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            @auth
            <a href="/user/profile" class="d-flex align-items-center gap-2 dropdown-item">
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
            <a href="/user/history" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-cloud fs-6"></i>
              <p class="mb-0 fs-3">My History</p>
            </a>
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