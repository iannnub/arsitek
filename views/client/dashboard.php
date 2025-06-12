<?php
// client/dashboard/index.php
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <!-- Bs Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body class="bg-white">
    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <ul class="navbar-nav">
                <div class="side-header">
                    <a href="../index.php" class="fs-20 fw-500">Dashboard Client</a>
                    <button type="button" class="btn-close d-xl-none" aria-label="Close"></button>
                </div>
                <li class="nav-item">
                    <a href="#" class="side-link on"><i class="bi bi-house me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('auth/logout') ?>" class="side-link"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </li>

                <!-- Add a Section for Navigation -->
                <li class="nav-item my-3 ps-3">
                    <span class="nav-label">PROYEK MANAGEMENT</span>
                </li>
                <li class="nav-item">
                    <a href="#progress" class="side-link"><i class="bi bi-graph-up-arrow me-2"></i> Progress Proyek </a>
                </li>
                <li class="nav-item">
                    <a href="#file-desain" class="side-link"><i class="bi bi-file-earmark-image me-2"></i> File Desain </a>
                </li>
                <li class="nav-item">
                    <a href="#ajukan-revisi" class="side-link"><i class="bi bi-pencil-square me-2"></i> Ajukan Revisi </a>
                </li>
                <li class="nav-item">
                    <a href="#unduh-rab" class="side-link"><i class="bi bi-file-earmark-text me-2"></i> RAB</a>
                </li>
                <li class="nav-item">
                    <a href="#upload-brief" class="side-link"><i class="bi bi-cloud-upload me-2"></i> Brief </a>
                </li>
                <li class="nav-item">
                    <a href="#status-pembayaran" class="side-link"><i class="bi bi-wallet me-2"></i> Cek Status Pembayaran & Invoice</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">

            <!-- Navbar -->
            <nav class="navbar content-header">
                <div class="container-fluid px-4">
                    <h1>Selamat datang, <?= htmlspecialchars($userName) ?>!</h1>
                </div>
            </nav>

            <!-- Page Body -->
            <div class="content-body">
                <div class="container-fluid">
                    <!-- Row for displaying project progress -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4" id="progress">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Progress Proyek</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-primary bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-graph-up-arrow"></i>
                                            </div>
                                        </div>
                                        <h2><?= count($projects) ?></h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah proyek yang sedang berjalan</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- File Desain -->
                        <div class="col-md-6 col-lg-4" id="file-desain">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">File Desain</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-success bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-file-earmark-image"></i>
                                            </div>
                                        </div>
                                        <h2><?= count($designFiles) ?></h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah file desain yang diunggah</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Revisi -->
                        <div class="col-md-6 col-lg-4" id="ajukan-revisi">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Revisi yang Diajukan</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-warning bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-pencil-square"></i>
                                            </div>
                                        </div>
                                        <h2><?= count($revisions) ?></h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah revisi yang diajukan</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- RAB -->
                        <div class="col-md-6 col-lg-4" id="unduh-rab">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">RAB</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-info bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </div>
                                        </div>
                                        <h2><?= count($rabs) ?></h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah RAB yang diunggah</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Upload Brief -->
                        <div class="col-md-6 col-lg-4" id="upload-brief">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Upload Brief</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-secondary bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                        </div>
                                        <h2>0</h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah brief yang diupload</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="col-md-6 col-lg-4" id="status-pembayaran">
                            <a href="#" class="dashb-card">
                                <div class="card shadow-1 rounded-16">
                                    <div class="card-body px-4 pb-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Status Pembayaran</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center bg-danger bg-gradient text-white rounded-circle" style="width: 2.5rem; height: 2.5rem;">
                                                <i class="bi bi-wallet"></i>
                                            </div>
                                        </div>
                                        <h2><?= count($payments) ?></h2>
                                        <p class="fw-500 fs-14 text-muted"><i class="bi bi-arrow-up"></i> Jumlah pembayaran yang diterima</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div> <!-- End of Row -->

                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
