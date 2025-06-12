<?php

class DashboardController
{
    // Fungsi untuk menampilkan dashboard admin
    public function admin()
    {
        session_start();

        // Cek apakah user sudah login dan memiliki role 'admin'
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            // Redirect jika akses ditolak
            header('Location: ' . url('auth/login'));
            exit;
        }

        // Tampilkan dashboard admin
        return view('admin/dashboard', ['name' => $_SESSION['user']['name']]);
    }

    // Fungsi untuk menampilkan dashboard client
    public function client()
    {
        session_start();

        // Cek apakah user sudah login dan memiliki role 'client'
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
            // Redirect jika akses ditolak
            header('Location: /auth/login');
            exit;
        }

        require_once ROOT_DIR . '/db/config.php';
        $userId = $_SESSION['user']['id'];

        // Ambil data yang diperlukan untuk client
        $stmt = mysqli_prepare($conn, "SELECT * FROM projects WHERE user_id = ?");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Ambil file desain yang terkait dengan proyek
        $stmt = mysqli_prepare($conn, "SELECT * FROM design_files WHERE project_id IN (SELECT id FROM projects WHERE user_id = ?)");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $designFiles = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Ambil RAB yang terkait dengan proyek
        $stmt = mysqli_prepare($conn, "SELECT * FROM rab WHERE project_id IN (SELECT id FROM projects WHERE user_id = ?)");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rabs = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Ambil revisi yang diajukan oleh client
        $stmt = mysqli_prepare($conn, "SELECT * FROM revisions WHERE project_id IN (SELECT id FROM projects WHERE user_id = ?)");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $revisions = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Ambil status pembayaran yang terkait dengan proyek
        $stmt = mysqli_prepare($conn, "SELECT * FROM payments WHERE project_id IN (SELECT id FROM projects WHERE user_id = ?)");
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Kirimkan data ke view yang sesuai
        return view('client/dashboard', [
            'userName' => $_SESSION['user']['name'],
            'projects' => $projects,
            'designFiles' => $designFiles,
            'rabs' => $rabs,
            'revisions' => $revisions,
            'payments' => $payments
        ]);
    }

    // Fungsi untuk logout
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . url('auth/login'));
        exit;
    }
}
