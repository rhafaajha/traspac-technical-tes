<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>

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

        html,
        body {
            background-color: rgb(240, 240, 240);
        }
    </style>
</head>

<body>
    <main>
        <div class="container login">
            <div class="d-flex justify-content-center align-items-center full-height">
                <div class="card p-4">
                    <h2 class="card-title text-center pb-0 fs-4">Login</h2>

                    <form method="POST" action="{{ route('login.process') }}" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Username atau Email</label>
                                <div class="input-container">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            name="username" placeholder="Masukkan username atau email"
                                            value="{{ old('username') ?? '' }}" required>
                                    </div>
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-container">
                                    <label id="show-password" aria-label="Show/Hide Password">
                                        <i class="bi bi-eye"></i>
                                    </label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="Masukkan password"
                                            value="{{ old('password') ?? '' }}" required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 btn-block">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
