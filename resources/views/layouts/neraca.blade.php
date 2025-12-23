<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neraca | Aplikasi Keuangan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* --- RESET & LAYOUT --- */
        body { background-color: #f4f6f9; margin: 0; padding: 0; }
        .page-wrapper { display: flex; width: 100%; }

        /* --- SIDEBAR DARK MODE --- */
        .left-sidebar {
            width: 260px;
            height: 100vh;
            background-color: #2b3446 !important;
            position: fixed;
            left: 0; top: 0; z-index: 100;
            display: flex; flex-direction: column; padding: 20px;
        }

        .sidebar-brand-text { 
            color: #ffffff; font-size: 18px; font-weight: 700; 
            text-align: center; margin-bottom: 30px; letter-spacing: 1px;
        }

        .sidebar-nav ul { list-style: none; padding: 0; margin: 0; }
        
        .sidebar-link { 
            color: #d1d5db !important; text-decoration: none; 
            display: flex; align-items: center; padding: 12px 15px; 
            font-size: 14px; border-radius: 8px; margin-bottom: 5px; transition: 0.3s;
        }
        
        .sidebar-link::before { content: "•"; margin-right: 15px; font-size: 18px; color: #6b7280; }
        
        /* HOVER EFFECT */
        .sidebar-link:hover { background: rgba(255,255,255,0.1); color: #fff !important; }

        /* ACTIVE STATE (Warna Biru) */
        .sidebar-link.active { background-color: #5d87ff !important; color: #ffffff !important; font-weight: 600; }
        .sidebar-link.active::before { color: #fff; }

        .logout-wrapper { margin-top: auto; padding-bottom: 10px; }
        .btn-logout-red { 
            background-color: #fa5a5a; color: white; border: none; width: 100%; 
            padding: 12px; border-radius: 12px; font-weight: 600; 
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }

        /* --- MAIN CONTENT --- */
        .body-wrapper { 
            margin-left: 260px; padding: 30px; width: calc(100% - 260px);
            min-height: 100vh; background-color: #fff;
        }

        .my-custom-center-container { max-width: 1100px; margin: auto; }

        .section-title {
            font-weight: 700; font-size: 20px; margin-bottom: 20px;
            border-left: 6px solid #5d87ff; padding-left: 12px; color: #2a3547;
        }

        .header-category { background-color: #f8fafd !important; font-weight: 800; color: #2a3547; }
        .table-neraca thead { background: #f8fafd; color: #2a3547; font-weight: bold; }
        
        .grand-total-box { background-color: #5d87ff; color: white; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 12px; }
        .grand-total-box-green { background-color: #13deb9; color: white; padding: 4px 10px; border-radius: 6px; font-weight: bold; font-size: 12px; }

        .table-container {
            border-radius: 12px; border: 1px solid #dde4ee;
            overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        @media print {
            .left-sidebar, .btn-print, .breadcrumb, .filter-section, .btn-logout-red { display: none !important; }
            .body-wrapper { margin: 0 !important; width: 100% !important; padding: 0 !important; }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">

        <aside class="left-sidebar">
            <div class="sidebar-brand-text">AKUNTANSI</div>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bukubesar') }}" class="sidebar-link {{ request()->routeIs('bukubesar*') ? 'active' : '' }}">
                            Buku Besar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('neraca') }}" class="sidebar-link {{ request()->routeIs('neraca*') ? 'active' : '' }}">
                            Neraca
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link {{ request()->is('laporan*') ? 'active' : '' }}">
                            Laporan
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="logout-wrapper">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-red">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="body-wrapper">
            <div class="my-custom-center-container">
                
                <div class="mb-4">
                    <div style="font-size: 1.5rem; font-weight: bold; color: #2a3547;">Keuangan & Akuntansi</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background: transparent; padding: 0;">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Neraca</li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 filter-section">
                    <h4 class="section-title m-0">
                        ⚖️ Laporan Neraca Per {{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}
                    </h4>
                    <div class="d-flex gap-2">
                        <form action="{{ route('neraca') }}" method="GET" class="d-flex gap-2">
                            <input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                        <button class="btn btn-success px-4 shadow-sm btn-print" onclick="window.print()">
                            <i class="fa fa-print"></i> Print / PDF
                        </button>
                    </div>
                </div>

                <div class="table-container shadow-sm mb-4">
                    <table class="table table-bordered mb-0 table-neraca align-middle">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 15%;">Kode</th>
                                <th style="width: 45%;">Keterangan Akun</th>
                                <th style="width: 20%;">Debit (IDR)</th>
                                <th style="width: 20%;">Kredit (IDR)</th>
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
                            <tr class="fw-bold">
                                <td></td>
                                <td><span class="grand-total-box">TOTAL ASET</span></td>
                                <td class="text-end text-primary" style="font-size: 1.1rem;">{{ number_format($totalAset, 0, ',', '.') }}</td>
                                <td class="text-end">-</td>
                            </tr>

                            <tr><td colspan="4" style="height: 20px; border:none; background: #fff;"></td></tr>

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
                            <tr class="fw-bold">
                                <td></td>
                                <td><span class="grand-total-box-green">TOTAL PASIVA</span></td>
                                <td class="text-end">-</td>
                                <td class="text-end text-success" style="font-size: 1.1rem;">{{ number_format($totalPasivaFinal, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if(round($totalAset) != round($totalPasivaFinal))
                <div class="alert alert-danger mt-4 border-0 shadow-sm d-flex align-items-center">
                    <i class="fa-solid fa-triangle-exclamation me-3" style="font-size: 1.5rem;"></i>
                    <div>
                        <strong>Neraca Tidak Balance!</strong><br>
                        Terdapat selisih sebesar Rp {{ number_format(abs($totalAset - $totalPasivaFinal), 0, ',', '.') }} antara Aktiva dan Pasiva.
                    </div>
                </div>
                @else
                <div class="alert alert-success mt-4 border-0 shadow-sm d-flex align-items-center">
                    <i class="fa-solid fa-circle-check me-3" style="font-size: 1.5rem;"></i>
                    <div>
                        <strong>Neraca Balance!</strong> Aktiva dan Pasiva sudah sesuai.
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>