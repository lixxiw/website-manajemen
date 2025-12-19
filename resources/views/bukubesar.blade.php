<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buku Besar | Aplikasi Keuangan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        /* ================================================= */
        /* TATA LETAK UTAMA (IDENTIK DENGAN NERACA) */
        /* ================================================= */
        .body-wrapper {
            border: none !important;
            box-shadow: none !important;
            margin-left: 270px !important;
            padding-top: 20px !important;
            width: calc(100% - 270px);
            min-height: 100vh;
            background-color: #ffffff;
        }

        .my-custom-center-container {
            max-width: 1200px;
            width: 95%;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        /* ================================================= */
        /* SIDEBAR STYLE (PERBAIKAN PRESISI) */
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

        /* ================================================= */
        /* TABEL & FILTER STYLE */
        /* ================================================= */
        .filter-card {
            border-radius: 15px;
            padding: 25px;
            border: 1px solid #dde4ee;
            background: white;
            margin-bottom: 25px;
        }

        .section-title {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 20px;
            border-left: 6px solid #5d87ff;
            padding-left: 12px;
        }

        .table-container {
            border-radius: 15px;
            border: 1px solid #dde4ee;
            overflow: hidden;
            background: white;
        }

        table thead {
            background: #f4f6fa;
        }

        table thead th {
            font-weight: 700 !important;
            text-align: center;
            padding: 14px !important;
            color: #2a3547;
        }

        /* ===== SCROLL KHUSUS TABEL ===== */
.table-scroll-wrapper {
    max-height: 600px; /* atur tinggi tabel */
    overflow-y: auto;
}

/* Header tabel tetap */
.table-scroll-wrapper thead th {
    position: sticky;
    top: 0;
    background: #f4f6fa;
    z-index: 2;
}

/* TOTAL tetap di bawah */
.table-scroll-wrapper tfoot td {
    position: sticky;
    bottom: 0;
    background: #f4f6fa;
    font-weight: bold;
    z-index: 2;
}

/* Biar scroll halus */
.table-scroll-wrapper::-webkit-scrollbar {
    width: 6px;
}
.table-scroll-wrapper::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}


        @media print {
            .left-sidebar, .filter-card, .breadcrumb, .sidebar-bottom { display: none !important; }
            .body-wrapper { margin: 0 !important; width: 100% !important; padding: 0 !important; }
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
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
                            <a class="sidebar-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link active" href="{{ route('bukubesar') }}">Buku Besar</a>
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
            <input
                type="date"
                class="form-control"
                id="startDate"
                name="start"
                value="{{ $start }}"
                required
            >
        </div>

        <div class="col-md-3">
            <label class="fw-bold mb-1">Tanggal Akhir :</label>
            <input
                type="date"
                class="form-control"
                id="endDate"
                name="end"
                value="{{ $end }}"
                required
            >
        </div>

        <div class="col-md-6 d-flex align-items-end gap-2">
            <button class="btn btn-primary" type="submit">Tampilkan</button>

            <a href="{{ route('bukubesar.export', ['start' => $start, 'end' => $end]) }}"
               class="btn btn-info text-white">
                Export Excel
            </a>

            <!-- PENTING: type="button" -->
            <button type="button" class="btn btn-success text-white" onclick="window.print()">
                Print
            </button>
        </div>
    </div>
</form>

                    </div>

                    <h4 class="section-title">
                        📘 Buku Besar | Tanggal Awal: {{ $start ?? '-' }} , Tanggal Akhir: {{ $end ?? '-' }}                    </h4>

                    <div class="table-container shadow-sm mb-5">
                        <div class="table-scroll-wrapper">
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

                                </tbody>
                                </tbody>

<tfoot>
<tr>
    <td colspan="2">TOTAL</td>
    <td class="text-end">{{ number_format($total_saldo_awal, 0, ',', '.') }}</td>
    <td class="text-end">{{ number_format($total_debit, 0, ',', '.') }}</td>
    <td class="text-end">{{ number_format($total_kredit, 0, ',', '.') }}</td>
    <td class="text-end">{{ number_format($total_saldo_akhir, 0, ',', '.') }}</td>
</tr>
</tfoot>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
   <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form[action*="bukubesar"]');
    const startInput = document.querySelector('input[name="start"]');
    const endInput = document.querySelector('input[name="end"]');

    if (!form || !startInput || !endInput) return;

    form.addEventListener('submit', function (e) {
        const startDate = new Date(startInput.value);
        const endDate = new Date(endInput.value);

        if (startDate > endDate) {
            e.preventDefault();
            alert('⚠️ Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir');
            startInput.focus();
        }
    });
});
</script>


</body>
</html>
