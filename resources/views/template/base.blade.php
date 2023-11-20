<!doctype html>
<html lang="en">

<head>
    @include('partials.link')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            @include('partials.aside')
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                @include('partials.header')
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
                <!--  Row 1 -->
                @include('partials.footer')
            </div>
        </div>
    </div>
    @yield('partials.loading')
    @include('partials.script')
</body>

</html>