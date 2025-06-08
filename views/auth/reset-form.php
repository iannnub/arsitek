<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Reset Password</h3>

            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger text-center"><?= $error ?></div>
            <?php endif; ?>

            <?php if (!empty($success)) : ?>
                <div class="alert alert-success text-center"><?= $success ?></div>
                <div class="text-center mt-3">
                    <a href="<?= url('auth/login') ?>" class="btn btn-primary">Login Sekarang</a>
                </div>
            <?php else : ?>
                <form method="POST" action="<?= url('auth/reset-password') ?>" id="resetForm">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">

                    <div class="mb-3">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="confirm_password" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Reset Password</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.getElementById('resetForm')?.addEventListener('submit', function(e) {
    const pwd = this.password.value;
    const confirm = this.confirm_password.value;
    if (pwd !== confirm) {
        e.preventDefault();
        alert('Password dan konfirmasi password tidak cocok!');
    }
});
</script>
<script src="<?= asset('js/auth-validation.js') ?>"></script>

</body>
</html>
