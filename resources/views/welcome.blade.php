<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Selamat Datang</title>

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <style>
        .full-height {
            height: 100vh;
        }

        img {
            max-width: 15rem;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center full-height">
        <div class="text-center align-items-center">
            <img src="{{ asset('image\logo-laravel-1024.png') }}" alt="">
            <h1>Selamat Datang</h1>
            <h4 class="mb-4">Pada Tes Teknis <b>Raihan Ahmad Fahrezi</b></h4>

            <div class="row row-cols-1 row-cols-sm-2 align-items-center">
                <div class="col">
                    <a type="button" class="btn btn-primary m-2 btn-block w-100" href="login"
                        title="Soal Kemampuan Teknis">Soal
                        Kemampuan Teknis</a>
                </div>
                <div class="col">
                    <a type="button" class="btn btn-danger m-2 btn-block w-100" href="#"
                        title="Soal Penalaran">Soal
                        Penalaran</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    @if (session()->has('pesan'))
        @php
            $toastClass = session()->get('success') == true ? 'text-bg-primary' : 'text-bg-danger';
        @endphp
        <div class="toast align-items-center {{ $toastClass }}" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session()->get('pesan') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
