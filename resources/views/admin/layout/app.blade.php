<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.partials.head')
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>


    @stack('styles')

</head>

<body class="hold-transition sidebar-mini dashboard-modern">
    {{-- Loading Screen --}}
    <div class="preloader flex-column justify-content-center align-items-center"
        style="background: linear-gradient(145deg, rgba(51, 97, 174, 0.78), rgba(16, 17, 20, 0.82));">
        <img class="animation__shake" src="{{ asset('assets/images/logo.png') }}" alt="SHS" width="150">
    </div>
    {{-- @minifyhtml --}}
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.layout.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layout.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('breadcrumb')
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Main Footer -->
        @include('admin.layout.partials.footer')
    </div>
    <!-- ./wrapper -->
    {{-- @endminifyhtml --}}

    <!-- REQUIRED SCRIPTS -->
    @include('admin.layout.partials.scripts')
    <script>
        $(document).ready(function() {
            $('.preloader').fadeOut('slow');

            Livewire.hook('element.init', () => {
                window.scrollTo(0, 0);
            })
        });
    </script>
    @stack('scripts')
</body>

</html>
