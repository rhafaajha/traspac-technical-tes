<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
                    <a type="button" class="btn btn-primary m-2" href="login" title="Soal Kemampuan Teknis">Soal
                        Kemampuan Teknis</a>
                </div>
                <div class="col">
                    <a type="button" class="btn btn-danger m-2" href="#" title="Soal Penalaran">Soal
                        Penalaran</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS dan dependensi lainnya jika perlu -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
