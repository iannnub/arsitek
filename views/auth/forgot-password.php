<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mb-4 text-center">Lupa Password</h3>

            <form method="POST" action="#">
                <div class="mb-3">
                    <label>Masukkan email Anda</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <button class="btn btn-warning w-100">Kirim Link Reset</button>

                <div class="mt-3 text-center">
                    <a href="<?= url('auth/login') ?>">Kembali ke login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
