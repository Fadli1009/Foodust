<!-- Sidebar scroll-->
@auth
<div>
    <div class="brand-logo d-flex align-items-center mt-3 mb-3">
        <a href="{{ url('/index') }}" class="text-nowrap logo-img">
          <img src="{{ asset('assets/images/logos/lyrapp.png') }}" width="80" alt="">
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
  
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Manage Makanan</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('barang.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">Lihat Makanan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('barang.create') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-circle-plus"></i>
                    </span>
                    <span class="hide-menu">Tambah Menu</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Manage Categories</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategori.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-category-2"></i>
                    </span>
                    <span class="hide-menu">Lihat Kategori</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kategori.create') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-plus"></i>
                    </span>
                    <span class="hide-menu">Tambah Kategori</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Reporting</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/report') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-chart-infographic"></i>
                    </span>
                    <span class="hide-menu">Report</span>
                </a>
            </li>
            <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                @include('partials.footer')
            </div>
    </nav>
    <!-- End Sidebar navigation -->
</div>
@endauth