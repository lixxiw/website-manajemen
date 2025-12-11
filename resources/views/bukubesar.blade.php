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
            margin: 15px 0 10px;
            padding-left: 15px;
        }

        .sidebar-item .sidebar-link {
            color: #c4d0e2 !important;
            transition: all 0.2s ease-in-out;
            border-radius: 7px;
            font-weight: 500;
        }

        .sidebar-item .sidebar-link.active {
            background-color: #5d87ff !important;
            color: #ffffff !important;
            font-weight: 600;
        }

        .sidebar-item .sidebar-link.active i {
            color: #ffffff !important;
        }

        /* ================================================= */
        /* LOGOUT PALING BAWAH */
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

        /* ================================================= */
        /* FILTER CARD */
        /* ================================================= */

        .filter-card {
            border-radius: 15px;
            padding: 25px;
            border: 1px solid #dde4ee;
            background: white;
        }

        .filter-card label {
            font-weight: 600;
            font-size: 14px;
        }

        /* ================================================= */
        /* HEADER BUKU BESAR */
        /* ================================================= */

        h4.section-title {
            font-weight: 700;
            font-size: 22px;
            margin-bottom: 25px;
            border-left: 6px solid #5d87ff;
            padding-left: 12px;
        }

        /* ================================================= */
        /* TABEL BUKU BESAR */
        /* ================================================= */

        .table-container {
            border-radius: 15px;
            border: 1px solid #dde4ee;
            overflow: hidden;
        }

        table thead {
            background: #f4f6fa;
        }

        table thead th {
            font-weight: 700 !important;
            text-align: center;
            padding: 14px !important;
        }

        table tbody tr:nth-child(even) {
            background: #fafbff;
        }

        table tbody tr:hover {
            background: #eef3ff !important;
            transition: 0.2s;
        }

        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }

        .table-responsive thead th {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        /* ========================================= */
        /* PRINT MODE - BIAR RAPI SAAT DI PRINT */
        /* ========================================= */
        @media print {

            .left-sidebar,
            .filter-card,
            .breadcrumb,
            .sidebar-bottom,
            .title-section {
                display: none !important;
            }

            .body-wrapper {
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }

            .table-container {
                border: none !important;
                box-shadow: none !important;
            }

            .table-responsive {
                overflow: visible !important;
                max-height: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper"
        data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">

        <aside class="left-sidebar">
            <div class="p-3">

                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo.svg" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <h2>AKUNTANSI</h2>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard') }}">
                                <i class="ti ti-layout-dashboard"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('bukubesar') }}">
                                <i class="ti ti-notebook"></i>
                                Buku Besar
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="ti ti-report"></i>
                                Laporan
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#">
                                <i class="ti ti-settings"></i>
                                Pengaturan
                            </a>
                        </li>

                        <li class="sidebar-item sidebar-bottom">
                            <a class="sidebar-logout-btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout"></i>
                                Logout
                            </a>

                            <form id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST" class="d-none">
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
                            <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="breadcrumb-item" href="{{ route('bukubesar') }}">Buku Besar</a>
                            <span class="breadcrumb-item active">Laporan Buku Besar</span>
                        </nav>
                    </div>

                    <div class="filter-card shadow-sm mb-4">
                        <form action="{{ route('bukubesar.filter') }}" method="GET" id="filterForm">
                            <div class="row g-3">

                                <input type="hidden" name="id_coa" value="all">

                                <div class="col-md-3">
                                    <label>Tanggal Awal :</label>
                                    <input type="date" class="form-control" name="start" value="{{ $start }}" required id="startDate">
                                </div>

                                <div class="col-md-3">
                                    <label>Tanggal Akhir :</label>
                                    <input type="date" class="form-control" name="end" value="{{ $end }}" required id="endDate">
                                </div>

                                <div class="col-md-6 d-flex align-items-end gap-3">
                                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                                    <a href="{{ route('bukubesar.export') }}" class="btn btn-info text-white">Export Excel</a>
                                    <button class="btn btn-success text-white" id="printBtn">Print</button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <h4 class="section-title">
                        📘 Buku Besar | Tanggal Awal: {{ $start ?? '-' }} ,
                        Tanggal Akhir: {{ $end ?? '-' }} |
                        Saldo Awal: {{ number_format($saldo_awal ?? 0,0,',','.') }}
                    </h4>


                    <div class="table-container shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Nomor Akun</th>
                                        <th>Akun</th>
                                        <th>Saldo Awal</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo Akhir</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($bukbes as $b)
                                    {{-- SKIP jika COA tidak ditemukan --}}
    @if(!$b->coa)
        @continue
    @endif
                                    <tr>
                                        <td>{{ $b->coa->coa_number }}</td>
                                        <td>{{ $b->coa->coa_name }}</td>
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

    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // PRINT BUTTON FUNCTION
            document.getElementById('printBtn').addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah submit jika button ini ada di dalam form
                window.print();
            });

            // --- VALIDASI TANGGAL ---
            const formFilter = document.getElementById('filterForm');
            const inputStart = document.getElementById('startDate');
            const inputEnd = document.getElementById('endDate');

            if (formFilter && inputStart && inputEnd) {
                formFilter.addEventListener('submit', function(e) {
                    const startDate = new Date(inputStart.value);
                    const endDate = new Date(inputEnd.value);

                    // Membandingkan tanggal (startDate > endDate)
                    if (startDate > endDate) {
                        // Mencegah pengiriman form
                        e.preventDefault();

                        // Tampilkan notifikasi alert
                        alert('🛑 Peringatan! Tanggal Awal tidak boleh lebih dari Tanggal Akhir. Silakan periksa kembali.');

                        // Opsional: berikan fokus ke input tanggal awal yang salah
                        inputStart.focus();
                    }
                });
            }
        });
    </script>

</body>
</html>
