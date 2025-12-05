<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Modernize Admin Template</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

    <style>
        /* ================================================= */
        /* PERBAIKAN TATA LETAK UTAMA: MEMBUAT KONTEN DI TENGAH AREA PUTIH YANG TERSISA */
        /* ================================================= */

        /* 1. BODY WRAPPER: Menentukan Posisi dan Lebar Area Konten Utama */
        .body-wrapper {
            border: none !important;
            box-shadow: none !important;

            /* PENTING: Menggeser konten utama ke kanan sebesar lebar sidebar */
            margin-left: 270px !important;

            /* Menghapus padding default yang mungkin menyebabkan geser */
            padding-left: 0 !important;
            padding-right: 0 !important;
            padding-top: 20px !important; /* Beri sedikit jarak dari atas */

            /* Memastikan area konten utama memenuhi sisa ruang */
            width: calc(100% - 270px);
            min-height: 100vh;
        }

        /* 2. KONTEN TENGAH: Atur Lebar Maksimal Konten dan Pusat di area yang tersisa */
        .my-custom-center-container {
            max-width: 1200px;
            width: 95%;

            /* PENTING: Pusatkan konten di dalam body-wrapper yang sudah digeser */
            margin-left: auto !important;
            margin-right: auto !important;

            /* Jarak internal agar tidak menempel ke sisi body-wrapper */
            padding-left: 15px;
            padding-right: 15px;
        }

        /* 3. Penyesuaian Global */
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
        /* CSS TEMA GELAP (Dark Mode) UNTUK SIDEBAR */
        /* ================================================= */

        /* Latar belakang Sidebar */
        .left-sidebar {
            background-color: #2a3547 !important;
        }

        /* Judul Menu */
        .left-sidebar h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff !important;
            margin-top: 15px;
            margin-bottom: 10px;
            padding: 0 15px;
            letter-spacing: 0.5px;
        }

        /* Tautan Menu (Normal) */
        .sidebar-item .sidebar-link {
            color: #c4d0e2 !important;
            transition: all 0.2s ease-in-out;
            border-radius: 7px;
            font-weight: 500;
        }

        /* Icon Menu (Normal) */
        .sidebar-item .sidebar-link i {
            color: #c4d0e2 !important;
        }

        /* Tautan Menu (Saat Aktif) */
        .sidebar-item .sidebar-link.active {
            background-color: #5d87ff !important; /* Warna biru sebagai highlight */
            color: #ffffff !important;
            font-weight: 600;
        }

        /* Icon Menu (Saat Aktif) */
        .sidebar-item .sidebar-link.active i {
            color: #ffffff !important;
        }

        /* Menghilangkan Divider jika ada */
        .sidebar-divider {
            display: none !important;
        }

        /* Style Konten Tambahan (dihapus karena konten dikosongkan) */
        /* .card { border-radius: 12px; } */
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
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="container my-custom-center-container">
                    </div>
                    @if(session('login'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('login') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- konten dashboard di sini -->
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