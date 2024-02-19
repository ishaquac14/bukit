<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Report IT | PT. Aisin Indonesia Automotive</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('sb-admin') }}/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('sb-admin') }}/css/styles.css" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <!-- Responsive navbar-->
    @include('layouts.navbar')

    @yield('body')

    <!-- Footer-->
    <div class="mt-5" style="font-size: 10px">
        <footer class="py-2 fixed-bottom" style="background-color: rgb(174, 174, 174)">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; IT Development 2023</p>
            </div>
        </footer>
    </div>
    <!-- Bootstrap core JS-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- Core theme JS-->
    <script src="{{ asset('sb-admin') }}/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>
