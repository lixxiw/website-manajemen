<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neraca | Aplikasi Keuangan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

    <style>
        /* --- SIDEBAR PLEK KETIPLEK (DARK MODE) --- */
        .left-sidebar {
            width: 260px;
            height: 100vh;
            background-color: #2b3446 !important; /* Warna Gelap Sesuai Gambar */
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar-brand-text {
            color: #ffffff;
            font-size: 18px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .sidebar-nav ul { list-style: none; padding: 0; }
        
        .sidebar-link {
            color: #d1d5db !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 15px;
            font-size: 14px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        /* Bullet Points ala Buku Besar */
        .sidebar-link::before {
            content: "•";
            margin-right: 15px;
            font-size: 18px;
            color: #6b7280;
        }

        .sidebar-link.active {
            background-color: #5d87ff !important;
            color: #ffffff !important;
        }

        .sidebar-link.active::before { color: #fff; }

        /* Tombol Logout Merah di Bawah Sidebar */
        .logout-wrapper { margin-top: auto; padding-bottom: 10px; }
        .btn-logout-red {
            background-color: #fa5a5a;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            text-align: left;
            padding-left: 20px;
        }

        /* --- TATA LETAK KONTEN (TANPA TOPBAR) --- */
        .body-wrapper {
            margin-left: 260px; /* Jarak dari sidebar */
            padding: 30px;
            background-color: #fff;
            min-height: 100vh;
        }

        .my-custom-center-container {
            max-width: 1100px;
            margin: auto;
        }

        /* Styling Tabel Kamu */
        .table-neraca thead { background: #f8fafd; color: #000; font-weight: bold; }
        .header-category { background-color: #f8fafd; font-weight: 800; color: #2a3547; }
        .grand-total-box { background-color: #5d87ff; color: white; padding: 5px 12px; border-radius: 6px; font-weight: bold; }
        .grand-total-box-green { background-color: #13deb9; color: white; padding: 5px 12px; border-radius: 6px; font-weight: bold; }
        .title-section { font-size: 28px; font-weight: bold; color: #2a3547; }
        
        @media print {
            .left-sidebar, .btn-print, .breadcrumb { display: none !important; }
            .body-wrapper { margin: 0 !important; width: 100% !important; }
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full">

        <aside class="left-sidebar">
            <div class="sidebar-brand-text">AKUNTANSI</div>
            
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="sidebar-link">Dashboard</a></li>
                    <li><a href="{{ route('bukubesar') }}" class="sidebar-link">Buku Besar</a></li>
                    <li><a href="{{ route('neraca') }}" class="sidebar-link active">Neraca</a></li>
                    <li><a href="#" class="sidebar-link">Laporan</a></li>
                    <li><a href="#" class="sidebar-link">Pengaturan</a></li>
                </ul>
            </nav>

            <div class="logout-wrapper">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-red">Logout</button>
                </form>
            </div>
        </aside>

        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="my-custom-center-container">

                    <div class="mb-4">
                        <div class="title-section">Keuangan & Akuntansi</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="background: transparent; padding: 0;">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item active">Laporan Neraca</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold m-0">⚖️ Laporan Neraca (Debit / Kredit)</h4>
                        <button class="btn btn-success px-4 shadow-sm btn-print" onclick="window.print()">
                            <i class="ti ti-printer"></i> Print / PDF
                        </button>
                    </div>

                    <div class="card shadow-sm p-4 border-0" style="border-radius: 15px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 table-neraca align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 10%;">Kode</th>
                                        <th style="width: 50%;">Keterangan Akun</th>
                                        <th style="width: 20%; text-align: right;">Debit (IDR)</th>
                                        <th style="width: 20%; text-align: right;">Kredit (IDR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="header-category">
                                        <td class="text-center">1</td>
                                        <td colspan="3">ASET (AKTIVA)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">1.1</td>
                                        <td>Kas dan Bank</td>
                                        <td class="text-end">1.295.500.000</td>
                                        <td class="text-end">-</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="fw-bold text-primary">TOTAL ASET LANCAR</td>
                                        <td class="text-end fw-bold">2.115.500.000</td>
                                        <td class="text-end">-</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span class="grand-total-box">TOTAL ASET</span></td>
                                        <td class="text-end fw-bold text-primary">4.765.500.000</td>
                                        <td class="text-end">-</td>
                                    </tr>

                                    <tr><td colspan="4" style="height: 20px; border:none;"></td></tr>

                                    <tr class="header-category">
                                        <td class="text-center">2 & 3</td>
                                        <td colspan="3">KEWAJIBAN & EKUITAS</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2.1</td>
                                        <td>Utang Usaha</td>
                                        <td class="text-end">-</td>
                                        <td class="text-end">450.000.000</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span class="grand-total-box-green">TOTAL PASIVA</span></td>
                                        <td class="text-end">-</td>
                                        <td class="text-end fw-bold text-success">4.765.500.000</td>
                                    </tr>
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
    <script src="../assets/js/app.min.js"></script>
</body>
</html>