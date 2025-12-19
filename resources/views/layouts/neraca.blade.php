<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neraca | Aplikasi Keuangan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">

    <style>
        /* --- SIDEBAR DARK MODE --- */
        .left-sidebar {
            width: 260px;
            height: 100vh;
            background-color: #2b3446 !important;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar-brand-text { color: #ffffff; font-size: 18px; font-weight: 700; text-align: center; margin-bottom: 30px; margin-top: 10px; }
        .sidebar-nav ul { list-style: none; padding: 0; }
        .sidebar-link { color: #d1d5db !important; text-decoration: none; display: flex; align-items: center; padding: 12px 15px; font-size: 14px; border-radius: 8px; margin-bottom: 5px; }
        .sidebar-link::before { content: "•"; margin-right: 15px; font-size: 18px; color: #6b7280; }
        .sidebar-link.active { background-color: #5d87ff !important; color: #ffffff !important; }
        .sidebar-link.active::before { color: #fff; }
        .logout-wrapper { margin-top: auto; padding-bottom: 10px; }
        .btn-logout-red { background-color: #fa5a5a; color: white; border: none; width: 100%; padding: 12px; border-radius: 12px; font-weight: 600; text-align: left; padding-left: 20px; }

        /* --- CONTENT --- */
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

        <aside class="left-sidebar">
            <div class="sidebar-brand-text">AKUNTANSI</div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="sidebar-link">Dashboard</a></li>
                    <li><a href="{{ route('bukubesar') }}" class="sidebar-link">Buku Besar</a></li>
                    <li><a href="{{ route('neraca') }}" class="sidebar-link active">Neraca</a></li>
                    <li><a href="#" class="sidebar-link">Laporan</a></li>
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
                                <li class="breadcrumb-item active">Laporan Neraca</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold m-0">⚖️ Laporan Neraca Per {{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}</h4>
                        <div class="d-flex gap-2 filter-section">
                            <form action="{{ route('neraca') }}" method="GET" class="d-flex gap-2">
                                <input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <button class="btn btn-success px-4 shadow-sm btn-print" onclick="window.print()">
                                Print / PDF
                            </button>
                        </div>
                    </div>

                    <div class="card shadow-sm p-4 border-0" style="border-radius: 15px;">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-neraca align-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 15%;">Kode</th>
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
                                            <td class="text-end">{{ number_format($saldo, 0, ',', '.') }}</td>
                                            <td class="text-end">-</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td><span class="grand-total-box">TOTAL ASET</span></td>
                                        <td class="text-end fw-bold text-primary">{{ number_format($totalAset, 0, ',', '.') }}</td>
                                        <td class="text-end">-</td>
                                    </tr>

                                    <tr><td colspan="4" style="height: 20px; border:none;"></td></tr>

                                    <tr class="header-category">
                                        <td class="text-center">2 & 3</td>
                                        <td colspan="3">KEWAJIBAN & EKUITAS</td>
                                    </tr>
                                    @php $totalPasiva = 0; @endphp
                                    
                                    @foreach($kewajiban as $item)
                                        @php 
                                            $saldo = $item->total_kredit - $item->total_debit; 
                                            $totalPasiva += $saldo;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $item->coa_number }}</td>
                                            <td>{{ $item->coa_name }}</td>
                                            <td class="text-end">-</td>
                                            <td class="text-end">{{ number_format($saldo, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                    @foreach($ekuitas as $item)
                                        @php 
                                            $saldo = $item->total_kredit - $item->total_debit; 
                                            $totalPasiva += $saldo;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $item->coa_number }}</td>
                                            <td>{{ $item->coa_name }}</td>
                                            <td class="text-end">-</td>
                                            <td class="text-end">{{ number_format($saldo, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="text-center">-</td>
                                        <td><em>Laba Tahun Berjalan</em></td>
                                        <td class="text-end">-</td>
                                        <td class="text-end">{{ number_format($laba_berjalan, 0, ',', '.') }}</td>
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
                        <div class="alert alert-danger mt-4 border-0 shadow-sm">
                            ⚠️ <strong>Neraca Tidak Balance!</strong> Selisih: Rp {{ number_format(abs($totalAset - $totalPasivaFinal), 0, ',', '.') }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>