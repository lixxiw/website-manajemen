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
            /* Pastikan container-fluid tidak mengganggu layout utama */
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
        }

        .left-sidebar h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff !important;
            margin-top: 15px;
            margin-bottom: 10px;
            padding: 0 15px;
            letter-spacing: 0.5px;
        }

        .sidebar-item .sidebar-link {
            color: #c4d0e2 !important;
            transition: all 0.2s ease-in-out;
            border-radius: 7px;
            font-weight: 500;
        }

        .sidebar-item .sidebar-link i {
            color: #c4d0e2 !important;
        }

        .sidebar-item .sidebar-link.active {
            background-color: #5d87ff !important;
            color: #ffffff !important;
            font-weight: 600;
        }

        .sidebar-item .sidebar-link.active i {
            color: #ffffff !important;
        }

        .sidebar-divider {
            display: none !important;
        }

        /* ================================================= */
        /* LOGOUT PALING BAWAH + JADI TOMBOL MERAH */
        /* ================================================= */

        .sidebar-bottom {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
        }

        .sidebar-logout-btn {
            background-color: #ff4d4f !important;
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 15px;
            margin: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.2s ease-in-out;
        }

        .sidebar-logout-btn i {
            color: #ffffff !important;
            font-size: 18px;
        }

        .sidebar-logout-btn:hover {
            background-color: #e04344 !important;
            transform: translateY(-2px);
        }

        .breadcrumb {
            font-size: 14px;
        }
        
        /* Style untuk section title */
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
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo.svg" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <h2 class="ps-3 pt-3">AKUNTANSI</h2>

                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('dashboard') }}" aria-expanded="false">
                                <i class="ti ti-layout-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('bukubesar') }}" aria-expanded="false">
                                <i class="ti ti-notebook"></i>
                                <span class="hide-menu">Buku Besar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <i class="ti ti-report"></i>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" aria-expanded="false">
                                <i class="ti ti-settings"></i>
                                <span class="hide-menu">Pengaturan</span>
                            </a>
                        </li>

                        <li class="sidebar-item sidebar-bottom">
                            <a class="sidebar-logout-btn" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout"></i>
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('bukubesar') }}">Buku Besar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Detail</li>
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