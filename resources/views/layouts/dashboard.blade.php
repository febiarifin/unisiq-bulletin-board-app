<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('adminwrap/assets/images/favicon.png') }}">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('adminwrap/assets/node_modules/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminwrap/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('adminwrap/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ asset('adminwrap/assets/node_modules/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('adminwrap/html/css/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('adminwrap/html/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset('adminwrap/html/css/colors/default.css') }}" id="theme" rel="stylesheet">
    {{-- Trix editor --}}
    <link rel="stylesheet" href="{{ asset('assets/css/trix.css') }}">
    <script src="{{ asset('assets/js/trix.js') }}"></script>
    {{-- My css --}}
    <style>
        .button-add {
            position: fixed;
            right: 2rem;
            bottom: 4rem;
            height: 40px;
            width: 40px;
        }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ config('app.name') }}</p>
        </div>
    </div>

    <div id="main-wrapper">

        @include('partials.dashboard.sidebar')

        <div class="page-wrapper">

            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">{{ $title }}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>

                @yield('content')

            </div>

            <footer class="footer"> © 2022 {{ config('app.name')}} by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
        </div>
    </div>

    <script src="{{ asset('adminwrap/assets/node_modules/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('adminwrap/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('adminwrap/html/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('adminwrap/html/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('adminwrap/html/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('adminwrap/html/js/custom.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('adminwrap/assets/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('adminwrap/assets/node_modules/morrisjs/morris.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('adminwrap/assets/node_modules/d3/d3.min.js') }}"></script>
    <script src="{{ asset('adminwrap/assets/node_modules/c3-master/c3.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('adminwrap/html/js/dashboard1.js') }}"></script>

    <!--Sweet Alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
    <script>
        Swal.fire({
         position: 'top-end',
         icon: 'success',
         title: '{{session('success')}}',
         showConfirmButton: false,
         timer: 1500
     })
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
         position: 'top-end',
         icon: 'error',
         title: '{{session('error')}}',
         showConfirmButton: false,
         timer: 1500
     })
    </script>
    @endif
</body>

<script>
    const confirmDelete = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin dihapus ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }

    const confirmLogout = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin logout ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }

    const confirmArsip = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin arsip postingan ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }

    const confirmPublish = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin publish postingan ?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }

    const confirmBanned = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin banned user ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }

    const confirmActivated = () => {
        event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Yakin ingin activated user ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
    }
</script>

<script>
    function previewFile(){
        const file = document.querySelector('#image');
        const filePreview = document.querySelector('.file-preview');
        filePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(file.files[0]);
        oFReader.onload = function(oFREvent) {
            filePreview.src = oFREvent.target.result;
        }
    }
</script>

</html>