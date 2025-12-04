<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan Laravel</title>

    <!-- BOOTSTRAP 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DATATABLES CSS (Bootstrap 5 Style) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background: #f5f7fa;
        }
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            padding: 80px 0;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        .hero img {
            max-height: 250px;
        }
        /* Feature Cards */
        .feature-card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        /* Decorative circles */
        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
        }
        .circle-blue { background: #0d6efd; }
        .circle-yellow { background: #ffc107; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <!-- Brand / Logo -->
            <a class="navbar-brand" href="#">
                <i class="fas fa-coins me-2"></i>ok
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto d-flex">
                    <!-- Login/Logout -->

                   <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn live-preview-drop fs-4 lh-sm btn-outline-primary rounded border-white border border-opacity-40 text-white d-flex align-items-center gap-2 px-3 py-2"
                                type="submit">
                                LOG OUT
                            </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">

            <!-- Hero Section -->
            <div class="hero mb-5">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-4 fw-bold">Selamat Datang di Aplikasi Keuangan</h1>
                        <p class="lead">Kelola transaksi, buku besar, dan laporan keuangan Anda dengan mudah dan efisien.</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Finance Illustration" class="img-fluid">
                    </div>
                </div>
                <!-- Decorative Circles -->
                <div class="circle circle-blue" style="width:80px;height:80px;top:-20px;right:-20px;"></div>
                <div class="circle circle-yellow" style="width:60px;height:60px;bottom:-10px;left:10px;"></div>
            </div>

            <!-- Feature Cards -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100 text-center py-4">
                        <i class="fas fa-file-invoice-dollar fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold">Transaksi</h5>
                        <p class="text-muted">Lihat, tambah, dan kelola semua transaksi keuangan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100 text-center py-4">
                        <i class="fas fa-book fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold">Buku Besar</h5>
                        <p class="text-muted">Pantau saldo, debit, dan kredit secara lengkap.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100 text-center py-4">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold">Laporan Keuangan</h5>
                        <p class="text-muted">Buat laporan dan analisis performa keuangan dengan cepat.</p>
                    </div>
                </div>
            </div>

            <!-- Banner -->
            <div class="p-5 rounded-4 text-center text-white mb-5"
                 style="background: linear-gradient(135deg, #0d6efd, #6610f2); box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <h2 class="fw-bold">Kelola Keuangan dengan Mudah!</h2>
                <p class="mb-0">Semua data transaksi, laporan, dan analisis ada di satu tempat.</p>
            </div>

        </div>
    </main>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
