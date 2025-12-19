<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neraca | Aplikasi Keuangan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

    <style>
        /* --- SIDEBAR CUSTOM --- */
        .left-sidebar {
            background-color: #2a3547 !important;
            width: 270px;
            height: 100vh;
<<<<<<< HEAD
            background-color: #2b3446 !important;
=======
>>>>>>> f06678120ed11095582c601398f2e9d0fc7c4f59
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

<<<<<<< HEAD
        .sidebar-brand-text { color: #ffffff; font-size: 18px; font-weight: 700; text-align: center; margin-bottom: 30px; margin-top: 10px; }
        .sidebar-nav ul { list-style: none; padding: 0; }
        .sidebar-link { color: #d1d5db !important; text-decoration: none; display: flex; align-items: center; padding: 12px 15px; font-size: 14px; border-radius: 8px; margin-bottom: 5px; }
        .sidebar-link::before { content: "•"; margin-right: 15px; font-size: 18px; color: #6b7280; }
        .sidebar-link.active { background-color: #5d87ff !important; color: #ffffff !important; }
        .sidebar-link.active::before { color: #fff; }
        .logout-wrapper { margin-top: auto; padding-bottom: 10px; }
        .btn-logout-red { background-color: #fa5a5a; color: white; border: none; width: 100%; padding: 12px; border-radius: 12px; font-weight: 600; text-align: left; padding-left: 20px; }
=======
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
>>>>>>> f06678120ed11095582c601398f2e9d0fc7c4f59

        /* --- CONTENT WRAPPER --- */
        .body-wrapper { margin-left: 260px; padding: 30px; background-color: #fff; min-height: 100vh; }
        .my-custom-center-container { max-width: 1100px; margin: auto; }

        /* --- TABLE STYLING --- */
        .table-neraca thead { background: #f8fafd; color: #000; font-weight: bold; }
        .header-category { background-color: #f8fafd; font-weight: 800; color: #2a3547; }
        .grand-total-box { background-color: #5d87ff; color: white; padding: 5px 12px; border-radius: 6px; font-weight: bold; }
        .grand-total-box-green { background-color: #13deb9; color: white; padding: 5px 12px; border-radius: 6px; font-weight: bold; }
        .title-section { font-size: 28px; font-weight: bold; color: #2a3547; }

        @media print {
            .left-sidebar, .btn-print, .breadcrumb, .filter-section { display: none !important; }
            .body-wrapper { margin: 0 !important; width: 100% !important; }
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full">

<<<<<<< HEAD
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
=======
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
                            <a class="sidebar-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link " href="{{ route('bukubesar') }}">Buku Besar</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('neraca') }}">Neraca</a>
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
>>>>>>> f06678120ed11095582c601398f2e9d0fc7c4f59
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
                                <li class="breadcrumb-item active">Laporan Neraca</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold m-0">⚖️ Laporan Neraca Per {{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}</h4>
                        <div>
                            <form action="{{ route('neraca') }}" method="GET" class="d-inline-block me-2 filter-section">
                                <input type="date" name="tanggal" class="form-control d-inline-block w-auto" value="{{ $tanggal }}" onchange="this.form.submit()">
                            </form>
                            <button class="btn btn-success px-4 shadow-sm btn-print" onclick="window.print()">
                                Print / PDF
                            </button>
                        </div>
                    </div>

                    <div class="card shadow-sm p-4 border-0" style="border-radius: 15px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 table-neraca align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 15%;">Kode Akun</th>
                                        <th style="width: 45%;">Keterangan Akun</th>
                                        <th style="width: 20%; text-align: right;">Debit (IDR)</th>
                                        <th style="width: 20%; text-align: right;">Kredit (IDR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="header-category">
                                        <td class="text-center">1</td>
                                        <td colspan="3">ASET (AKTIVA)</td>
                                    </tr>
                                    @php $totalAset = 0; @endphp
                                    @foreach($aset as $item)
                                        @php 
                                            $saldo = $item->total_debit - $item->total_kredit; 
                                            $totalAset += $saldo;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $item->coa_number }}</td>
                                            <td>{{ $item->coa_name }}</td>
                                            <td class="text-end text-primary">{{ number_format($saldo, 0, ',', '.') }}</td>
                                            <td class="text-end">-</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><span class="grand-total-box">TOTAL ASET</span></td>
                                        <td class="text-end fw-bold text-primary">{{ number_format($totalAset, 0, ',', '.') }}</td>
                                        <td class="text-end">-</td>
                                    </tr>

                                    <tr><td colspan="4" style="height: 30px; border:none;"></td></tr>

                                    <tr class="header-category">
                                        <td class="text-center">2 & 3</td>
                                        <td colspan="3">KEWAJIBAN & EKUITAS</td>
                                    </tr>
                                    @php $totalPasiva = 0; @endphp
                                    
                                    {{-- Kewajiban --}}
                                    @foreach($kewajiban as $item)
                                        @php 
                                            $saldo = $item->total_kredit - $item->total_debit; 
                                            $totalPasiva += $saldo;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $item->coa_number }}</td>
                                            <td>{{ $item->coa_name }}</td>
                                            <td class="text-end">-</td>
                                            <td class="text-end text-success">{{ number_format($saldo, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                    {{-- Ekuitas --}}
                                    @foreach($ekuitas as $item)
                                        @php 
                                            $saldo = $item->total_kredit - $item->total_debit; 
                                            $totalPasiva += $saldo;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $item->coa_number }}</td>
                                            <td>{{ $item->coa_name }}</td>
                                            <td class="text-end">-</td>
                                            <td class="text-end text-success">{{ number_format($saldo, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                    {{-- Laba Tahun Berjalan --}}
                                    <tr>
                                        <td class="text-center">-</td>
                                        <td><em>Laba Tahun Berjalan</em></td>
                                        <td class="text-end">-</td>
                                        <td class="text-end text-success">{{ number_format($laba_berjalan, 0, ',', '.') }}</td>
                                    </tr>

                                    @php $totalPasivaFinal = $totalPasiva + $laba_berjalan; @endphp
                                    <tr>
                                        <td></td>
                                        <td><span class="grand-total-box-green">TOTAL PASIVA</span></td>
                                        <td class="text-end">-</td>
                                        <td class="text-end fw-bold text-success">{{ number_format($totalPasivaFinal, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        @if(round($totalAset) != round($totalPasivaFinal))
                        <div class="alert alert-danger mt-4 border-0 shadow-sm" style="border-radius: 10px;">
                            ⚠️ <strong>Neraca Tidak Balance!</strong> Terdapat selisih sebesar Rp {{ number_format(abs($totalAset - $totalPasivaFinal), 0, ',', '.') }}. Periksa kembali jurnal penyesuaian Anda.
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
