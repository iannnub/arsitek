<?php
// Mulai sesi
session_start();

// Hapus semua data session
session_destroy();

// Hapus semua session variables
unset($_SESSION);

// Redirect ke halaman login setelah logout
header("Location: /auth/login");
exit;
?>
