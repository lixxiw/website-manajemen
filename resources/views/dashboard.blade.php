<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Aplikasi Keuangan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ================================================= */
        /* PERBAIKAN TATA LETAK UTAMA */
        /* ================================================= */

        .body-wrapper {
            border: none !important;
            box-shadow: none !important;
            margin-left: 270px !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding-top: 20px !important;
            width: calc(100% - 270px);
            min-height: 100vh;
        }

        .my-custom-center-container {
            max-width: 1200px;
            width: 95%;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 15px;
            padding-right: 15px;
        }

        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .page-wrapper, #main-wrapper {
            border: none !important;
            box-shadow: none !important;
            margin-left: 0 !important;
        }
        .app-topstrip {
            display: none !important;
        }

        /* ================================================= */
        /* DARK MODE SIDEBAR */
        /* ================================================= */

        .left-sidebar {
            background-color: #2a3547 !important;
            width: 270px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .left-sidebar h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff !important;
            margin: 25px 0 15px;
            padding-left: 25px;
            letter-spacing: 1px;
        }

        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-item {
            padding: 0 15px;
            margin-bottom: 4px;
        }

        .sidebar-item .sidebar-link {
            color: #c4d0e2 !important;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            transition: all 0.2s;
            font-weight: 500;
            border-radius: 7px;
        }

        /* Bullet point di depan menu */
        .sidebar-item .sidebar-link::before {
            content: "•";
            margin-right: 12px;
            font-size: 1.2rem;
            color: #6b7280;
        }

        .sidebar-item .sidebar-link.active {
            background-color: #5d87ff !important;
            color: #ffffff !important;
        }

        .sidebar-item .sidebar-link.active::before {
            color: #ffffff;
        }

        /* ================================================= */
        /* LOGOUT BUTTON (FIX DI BAWAH) */
        /* ================================================= */
        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            padding: 0 15px;
        }

        .sidebar-logout-btn {
            background-color: #ff4d4f !important;
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            border: none;
            width: 100%;
            transition: 0.2s;
        }

        .sidebar-logout-btn:hover {
            background-color: #e04344 !important;
            transform: translateY(-2px);
        }
        .breadcrumb {
            font-size: 14px;
        }

        .title-section {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

       <aside class="left-sidebar">
            <div class="p-3">
                <div class="brand-logo d-flex align-items-center justify-content-center mb-4">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo.svg" alt="" width="150" />
                    </a>
                </div>

                <nav class="sidebar-nav">
                    <ul>
                        <h2>AKUNTANSI</h2>
                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link " href="{{ route('bukubesar') }}">Buku Besar</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('neraca') }}">Neraca</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">Laporan</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">Pengaturan</a>
                        </li>
                    </ul>

                    <div class="sidebar-bottom">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="sidebar-logout-btn">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </aside>
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="my-custom-center-container">

                    @if(session('login'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('login') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="title-section">Keuangan & Akuntansi</div>

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                    <div class="row">
                         </div>

                </div>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
