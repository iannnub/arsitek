<?php

class DashboardController
{
    public function admin()
    {
        session_start();
        if ($_SESSION['user']['role'] !== 'admin') {
            die('Akses ditolak');
        }

        echo "<h1>Selamat Datang Admin {$_SESSION['user']['name']}</h1>";
        echo '<a href="' . url('logout') . '">Logout</a>';
    }

    public function client()
    {
        session_start();
        if ($_SESSION['user']['role'] !== 'client') {
            die('Akses ditolak');
        }

        echo "<h1>Selamat Datang Klien {$_SESSION['user']['name']}</h1>";
        echo '<a href="' . url('logout') . '">Logout</a>';
    }
}
