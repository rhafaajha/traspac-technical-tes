<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Artikel - Sort</title>

    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <a href="{{ route('artikel.index') }}" class="logo d-flex align-items-center">
            <i class="bi bi-arrow-left-circle" style="font-size: 1.5rem"></i>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('artikel.index') }}" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Artikel</span>
        </a>
    </header>
    <!-- End Header -->

    <!-- === Main Page ==== -->
    <main id="main" class="main">
        <section class="section daftar" id="daftar">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Pengurutan kata berdasar abjad</h2>

                            <h2>
                                <strong>Sorted Words Alphabetically</strong>
                            </h2>

                            {{-- @foreach ($sortedWords as $result)
                                <p style="text-align: justify;">{{ implode(', ', $result['sorted']) }}</p>
                            @endforeach --}}

                            <div class="row">
                                @foreach ($wordCounts as $word => $count)
                                    <div class="col-md-2">
                                        <ul>
                                            <li>{{ $word }} = {{ $count }} kata</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
