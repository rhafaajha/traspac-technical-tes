<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .full-height {
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center full-height">
        <div class="card p-4" style="width: 300px;">
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label for="username">Username atau Email</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username atau email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS dan dependensi lainnya jika perlu -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
