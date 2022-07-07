<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title}}</title>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
    @include('partials.home.navbar')
    <!-- End modal -->

    <!-- End Navbar -->

    <!-- Content -->
    <div class="bg-light content">
        @yield('content')
    </div>
    <!-- End Content -->

    <!-- Footer -->
    @include('partials.home.footer')
    <!-- End footer -->

    <!-- Back to Top -->
    <button class="back-to-top btn btn-primary shadow rounded-circle"><i
            class="bi bi-arrow-up-circle-fill"></i></button>

    <script>
        const showOnPx = 100;
        const backToTopButton = document.querySelector(".back-to-top");

        const scrollContainer = () => {
            return document.documentElement || document.body;
        };

        document.addEventListener("scroll", () => {
            if (scrollContainer().scrollTop > showOnPx) {
                backToTopButton.classList.remove("hidden");
            } else {
                backToTopButton.classList.add("hidden");
            }
        });

        const goToTop = () => {
            document.body.scrollIntoView({
                behavior: "smooth",
            });
        };

        backToTopButton.addEventListener("click", goToTop);
    </script>
    <!-- End back to top -->

    <!-- My Js -->
    <script src="{{ asset('assets/js/style.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

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
</html>