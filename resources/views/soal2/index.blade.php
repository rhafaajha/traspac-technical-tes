<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Artikel</title>

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
        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
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
                            {{-- @foreach ($data as $artikel)
                                <h5 class="card-title">{{ $artikel->judul }}</h5>
                                <p style="text-align: justify;">{{ $artikel->artikel }}</p>
                            @endforeach --}}

                            @foreach ($data as $artikel)
                                <h5 class="card-title">Judul: {{ $artikel->judul }}</h5>

                                @foreach ($artikel->paragraphs as $paragraph)
                                    @if (trim($paragraph) != '')
                                        <p style="text-align: justify; text-indent: 2rem;">{{ $paragraph }}</p>
                                    @endif
                                @endforeach
                            @endforeach

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            Pencarian berdasarkan kata
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body m-2">
                                            <!-- Form untuk Search Word -->
                                            <form action="{{ route('artikel.search') }}" method="GET" class="row">
                                                @csrf
                                                <div class="col form-floating">
                                                    <input type="text" name="keyword" class="form-control"
                                                        id="floatingInput" placeholder="Search keyword">
                                                    <label for="floatingInput" class="ms-3"
                                                        style="background-color: none">Keyword</label>
                                                </div>
                                                <button type="submit" class="col-1 btn btn-primary">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Penggantian Kata (Replace)
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body m-2">
                                            <!-- Form untuk Replace Word -->
                                            <form action="{{ route('artikel.replace') }}" method="GET" class="row">
                                                @csrf
                                                <div class="col form-floating">
                                                    <input type="text" name="find" class="form-control"
                                                        id="floatingInput" placeholder="Find word">
                                                    <label for="floatingInput" class="ms-3"
                                                        style="background-color: none">Find word</label>
                                                </div>
                                                <div class="col form-floating">
                                                    <input type="text" name="replace" class="form-control"
                                                        id="floatingInput" placeholder="Replace with">
                                                    <label for="floatingInput" class="ms-3"
                                                        style="background-color: none">Replace with</label>
                                                </div>
                                                <button type="submit" class="col-1 btn btn-primary">Replace</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            Pengurutan kata berdasar abjad
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body m-2">
                                            <!-- Form untuk Replace Word -->
                                            <form action="{{ route('artikel.sort') }}" method="GET" class="row">
                                                @csrf
                                                <button type="submit" class="col-1 btn btn-primary">Sort</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
