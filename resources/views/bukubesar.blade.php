<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Besar | Modernize Admin Template</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

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

        .app-topstrip {
            display: none !important;
        }

        /* ================================================= */
        /* TOMBOL LOGOUT PALING BAWAH */
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
                            <a class="sidebar-link" href="{{ route('dashboard') }}">
                                <i class="ti ti-layout-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('bukubesar') }}">
                                <i class="ti ti-notebook"></i>
                                <span class="hide-menu">Buku Besar</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="ti ti-report"></i>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="ti ti-settings"></i>
                                <span class="hide-menu">Pengaturan</span>
                            </a>
                        </li>

                        <!-- =========================== -->
                        <!-- LOGOUT PALING BAWAH         -->
                        <!-- =========================== -->
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
                <div class="container my-custom-center-container">

                    <div>
                        <div class="title-section">Keuangan & Akuntansi</div>
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item text-decoration-none" href="{{ route('home') }}">Home</a>
                            <a class="breadcrumb-item text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="breadcrumb-item text-decoration-none" href="{{ route('bukubesar') }}">Buku Besar</a>
                            <span class="breadcrumb-item active">Laporan Buku Besar</span>
                        </nav>
                    </div>

                    <div class="card p-4 shadow-sm mb-4">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="fw-bold">Tanggal Awal :</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="col-md-3">
                                <label class="fw-bold">Tanggal Akhir :</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                            <div class="col-md-6 d-flex align-items-end gap-2">
                                <button class="btn btn-primary" id="filterBtn">Tampilkan</button>
                                <a href="{{ route('bukubesar.export') }}" class="btn btn-info text-white">Export Excel</a>
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3 fw-bold">
                        📘 Buku Besar | Tanggal Awal : - , Tanggal Akhir : -
                    </h4>

                    <div class="card shadow-sm p-4">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>date_transaction</th>
                                    <th>Saldo Awal</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Saldo Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukbes as $b)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ number_format($b->saldo_awal ?? 0, 0, ',', '.') }}</td>
                                    <td>{{ number_format($b->debit ?? 0, 0, ',', '.') }}</td>
                                    <td>{{ number_format($b->kredit ?? 0, 0, ',', '.') }}</td>
                                    <td>{{ number_format($b->saldo_akhir ?? 0, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnTampilkan = document.getElementById('filterBtn');
    const startInput = document.getElementById('startDate');
    const endInput = document.getElementById('endDate');
    const titleBuku = document.querySelector('h4.mb-3.fw-bold');
    const table = document.querySelector('table.table-bordered');
