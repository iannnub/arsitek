<?php
class AuthController
{
    public function loginForm()
    {
        view('auth/login');
    }

    public function registerForm()
    {
        view('auth/register');
    }

    public function forgotForm()
    {
        view('auth/forgot-password');
    }

    public function resetForm($token)
    {
        view('auth/reset-form', ['token' => $token]);
    }

    public function handleResetRequest()
    {
        require_once ROOT_DIR . '/db/config.php';
        $email = trim($_POST['email'] ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return view('auth/forgot-password', ['error' => 'Email tidak valid.']);
        }

        $token = bin2hex(random_bytes(32));
        mysqli_query($conn, "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')");

        // Simulasi kirim email
        $resetLink = url("auth/reset-password?token=$token");
        file_put_contents(STORAGE_DIR . "/reset_email_log.txt", "Reset link: $resetLink\n", FILE_APPEND);

        return view('auth/forgot-password', ['success' => 'Link reset telah dikirim ke email Anda (simulasi).']);
    }

    public function handleResetPassword()
    {
        require_once ROOT_DIR . '/db/config.php';
        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if ($password !== $confirm) {
            return view('auth/reset-form', ['error' => 'Password tidak cocok.', 'token' => $token]);
        }

        $query = mysqli_query($conn, "SELECT * FROM password_resets WHERE token = '$token' ORDER BY created_at DESC LIMIT 1");
        $reset = mysqli_fetch_assoc($query);

        if (!$reset) {
            return view('auth/reset-form', ['error' => 'Token tidak valid.', 'token' => $token]);
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE users SET password = '$hashed' WHERE email = '{$reset['email']}'");
        mysqli_query($conn, "DELETE FROM password_resets WHERE email = '{$reset['email']}'");

        return view('auth/reset-form', ['success' => 'Password berhasil direset. Silakan login.', 'token' => null]);
    }

    public function handleAuth()
    {
        require_once ROOT_DIR . '/db/config.php';
        session_start();

        $action = $_POST['action'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'];

        // === REGISTRASI ===
        if ($action === 'register') {
            $firstName = trim($_POST['first_name'] ?? '');
            $lastName = trim($_POST['last_name'] ?? '');
            $email = trim($_POST['email'] ?? ''); // Menghapus filter var

            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
                return view('auth/register', ['error' => 'Semua field wajib diisi.']);
            }

            // Menghapus validasi email
            if ($password !== $confirmPassword) {
                return view('auth/register', ['error' => 'Konfirmasi password tidak cocok.']);
            }

            $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            if (mysqli_num_rows($check) > 0) {
                return view('auth/register', ['error' => 'Email sudah terdaftar.']);
            }

            $hashed = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$hashed')");

            return view('auth/register', ['success' => 'Registrasi berhasil. Silakan login.']);
        }

        // === LOGIN ===
        if ($action === 'login') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            $user = mysqli_fetch_assoc($query);
            $status = 'fail';

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['first_name'] . ' ' . $user['last_name'],
                    'role' => $user['role']
                ];
                $status = 'success';
            }

            $uid = $user['id'] ?? 'NULL';
            mysqli_query($conn, "INSERT INTO login_logs (user_id, email, ip_address, status) VALUES ($uid, '$email', '$ip', '$status')");

            if ($status === 'fail') {
                return view('auth/login', ['error' => 'Email atau password salah.']);
            }

            header('Location: ' . url($user['role'] === 'admin' ? 'menu-admin' : 'menu-client'));
            exit;
        }

        return view('auth/login', ['error' => 'Aksi tidak dikenali.']);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . url('auth/login'));
        exit;
    }
}
