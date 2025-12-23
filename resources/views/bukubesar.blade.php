<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Besar | Aplikasi Keuangan</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        /* --- RESET & LAYOUT --- */
        body { background-color: #f4f6f9; }
        .page-wrapper { display: flex; width: 100%; }

        /* --- SIDEBAR DARK MODE --- */
        .left-sidebar {
            width: 260px; height: 100vh; background-color: #2b3446 !important;
            position: fixed; left: 0; top: 0; z-index: 100;
            display: flex; flex-direction: column; padding: 20px;
        }
        .sidebar-brand-text { color: #ffffff; font-size: 18px; font-weight: 700; text-align: center; margin-bottom: 30px; letter-spacing: 1px; }
        .sidebar-nav ul { list-style: none; padding: 0; margin: 0; }
        .sidebar-link { color: #d1d5db !important; text-decoration: none; display: flex; align-items: center; padding: 12px 15px; font-size: 14px; border-radius: 8px; margin-bottom: 5px; transition: 0.3s; }
        .sidebar-link::before { content: "•"; margin-right: 15px; font-size: 18px; color: #6b7280; }
        .sidebar-link:hover { background: rgba(255,255,255,0.1); }
        .sidebar-link.active { background-color: #5d87ff !important; color: #ffffff !important; }
        .sidebar-link.active::before { color: #fff; }

        .logout-wrapper { margin-top: auto; padding-bottom: 10px; }
        .btn-logout-red { background-color: #fa5a5a; color: white; border: none; width: 100%; padding: 12px; border-radius: 12px; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px; }

        /* --- MAIN CONTENT --- */
        .body-wrapper { margin-left: 260px; padding: 30px; width: calc(100% - 260px); min-height: 100vh; background-color: #fff; }
        .my-custom-center-container { max-width: 1100px; margin: auto; }

        /* --- CARDS & TABLES --- */
        .filter-card { border-radius: 15px; padding: 20px; border: 1px solid #dde4ee; background: #fff; margin-bottom: 25px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .section-title { font-weight: 700; font-size: 20px; margin-bottom: 20px; border-left: 6px solid #5d87ff; padding-left: 12px; color: #2a3547; }
        .table-container { border-radius: 12px; border: 1px solid #dde4ee; overflow: hidden; }

        @media print {
            .left-sidebar, .btn-print, .breadcrumb, .filter-card, .btn-info { display: none !important; }
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
                    <li><a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->is('dashboard*') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('bukubesar') }}" class="sidebar-link {{ request()->is('bukubesar*') ? 'active' : '' }}">Buku Besar</a></li>
                    <li><a href="{{ route('neraca') }}" class="sidebar-link {{ request()->is('neraca*') ? 'active' : '' }}">Neraca</a></li>
                    <li><a href="#" class="sidebar-link">Laporan</a></li>
                </ul>
            </nav>
            <div class="logout-wrapper">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-red"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
            </div>
        </aside>

        <div class="body-wrapper">
            <div class="my-custom-center-container">
                <div class="mb-4">
                    <div style="font-size: 1.5rem; font-weight: bold; color: #2a3547;">Keuangan & Akuntansi</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background: transparent; padding: 0;">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Buku Besar</li>
                        </ol>
                    </nav>
                </div>

                <div class="filter-card shadow-sm">
                    <form id="filterForm" action="{{ route('bukubesar.filter') }}" method="GET">
                        <div class="row g-3">
                            <input type="hidden" name="id_coa" value="all">
                            
                            <div class="col-md-3">
                                <label class="fw-bold mb-1">Tanggal Awal :</label>
                                <input type="text" class="form-control" id="startDate" name="start" value="{{ $start }}" placeholder="Pilih Tanggal" required>
                            </div>

                            <div class="col-md-3">
                                <label class="fw-bold mb-1">Tanggal Akhir :</label>
                                <input type="text" class="form-control" id="endDate" name="end" value="{{ $end }}" placeholder="Pilih Tanggal" required>
                            </div>

                            <div class="col-md-6 d-flex align-items-end gap-2">
                                <button class="btn btn-primary" type="submit">Tampilkan</button>
                                <a href="{{ route('bukubesar.export', ['start' => $start, 'end' => $end]) }}" class="btn btn-info text-white">Export Excel</a>
                                <button type="button" class="btn btn-success text-white" onclick="window.print()">Print</button>
                            </div>
                        </div>
                    </form>
                </div>

                <h4 class="section-title">
                    📘 Buku Besar | 
                    Periode: {{ $start ? \Carbon\Carbon::parse($start)->format('d/m/Y') : '-' }} - 
                    {{ $end ? \Carbon\Carbon::parse($end)->format('d/m/Y') : '-' }}
                </h4>

                <div class="table-container shadow-sm mb-5">
                    <table class="table table-bordered table-hover text-center mb-0">
                        <thead style="background: #f8fafd; color: #2a3547;">
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
                            @if(isset($bukbes) && count($bukbes) > 0)
                                @foreach($bukbes as $b)
                                    @if(!$b->coa) @continue @endif
                                    <tr>
                                        <td>{{ $b->coa->coa_number }}</td>
                                        <td class="text-start">{{ $b->coa->coa_name }}</td>
                                        <td class="text-end">{{ number_format($b->saldo_awal ?? 0, 0, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($b->debit ?? 0, 0, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($b->kredit ?? 0, 0, ',', '.') }}</td>
                                        <td class="text-end">{{ number_format($b->saldo_akhir ?? 0, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-muted">Silakan pilih tanggal untuk menampilkan data.</td>
                                </tr>
                            @endif
                        </tbody>
                        @if(isset($bukbes) && count($bukbes) > 0)
                        <tfoot>
                            <tr class="fw-bold" style="background: #f8fafd;">
                                <td colspan="2">TOTAL</td>
                                <td class="text-end">{{ number_format($total_saldo_awal ?? 0, 0, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($total_debit ?? 0, 0, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($total_kredit ?? 0, 0, ',', '.') }}</td>
                                <td class="text-end">{{ number_format($total_saldo_akhir ?? 0, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateConfig = {
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "d/m/Y",
                allowInput: true
            };
            flatpickr("#startDate", dateConfig);
            flatpickr("#endDate", dateConfig);
        });
    </script>
</body>
</html>