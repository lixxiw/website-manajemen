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
        .my-custom-center-container {
            max-width: 1000px;
            margin-left: auto !important;
            margin-right: auto !important;
            padding-left: 15px;
            padding-right: 15px;
        }
        .card { border-radius: 12px; }
        table thead {
            background: #eaeaea;
            color: #000;
            font-weight: bold;
        }
        .title-section {
            font-size: 28px;
            font-weight: bold;
        }
        .breadcrumb {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <div class="app-topstrip bg-dark py-3 px-4 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-none d-sm-flex align-items-center justify-content-center gap-9 mb-3 mb-lg-0">
                <a class="d-flex justify-content-center" href="https://adminmart.com/" target="_blank">
                    <img src="../assets/images/logos/logo-adminmart.svg" alt="" width="150">
                </a>
                <div class="d-none d-xl-flex align-items-center gap-3 border-start border-white border-opacity-25 ps-9">
                    <a target="_blank" href="#"></a>
                </div>
            </div>
            <div class="d-sm-flex align-items-center justify-content-center gap-8">
                <div class="d-flex align-items-center justify-content-center gap-8">
                    <div class="dropdown d-flex">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn live-preview-drop fs-4 lh-sm btn-outline-primary rounded border-white border border-opacity-40 text-white d-flex align-items-center gap-2 px-3 py-2"
                                type="submit">
                                LOG OUT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <aside class="left-sidebar">
            <div class="p-3">
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo.svg" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                  <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
     <h2>AKUNTANSI</H2>

            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('bukubesar') }}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">BUKU BESAR</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" target="_blank"
                href="https://bootstrapdemos.adminmart.com/modernize/dist/main/index.html" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-aperture"></i>
                  </span>
                  <span class="hide-menu">Naraca</span>
                </div>

              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between" target="_blank"
                href="https://bootstrapdemos.adminmart.com/modernize/dist/main/index2.html" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-shopping-cart"></i>
                  </span>
                  <span class="hide-menu">eCommerce</span>
                </div>

            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Front Pages</span>
                </div>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <!-- ... tetap sama semua ... -->
              </ul>
            </li>

            <li>
              <span class="sidebar-divider lg"></span>
            </li>

        </aside>
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="container my-custom-center-container mt-4">

                    <div>
                        <div class="title-section">Keuangan & Akuntansi</div>
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item text-decoration-none" href="#">Home</a>
                            <a class="breadcrumb-item text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="breadcrumb-item text-decoration-none" href="{{ route('bukubesar') }}">bukubesar</a>
                            <span class="breadcrumb-item active">Buku Besar</span>

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



                    <div class="card shadow-sm p-4">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>account</th>
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

    btnTampilkan.addEventListener('click', function() {
        const startDate = startInput.value ? new Date(startInput.value) : null;
        const endDate = endInput.value ? new Date(endInput.value) : null;

        titleBuku.innerText = `📘 Buku Besar | Tanggal Awal : ${startInput.value || '-'} , Tanggal Akhir : ${endInput.value || '-'}`;

        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let dateParts = row.cells[0].innerText.split('/');
            if(dateParts.length === 3) {
                let date = new Date(dateParts[2], dateParts[1]-1, dateParts[0]);
                if(startDate && endDate) {
                    row.style.display = (date >= startDate && date <= endDate) ? '' : 'none';
                } else {
                    row.style.display = '';
                }
            } else {
                row.style.display = '';
            }
        });
    });
});
</script>

</body>

</html>
