<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Besar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f5f6fa; }
        .card { border-radius: 12px; }
        table thead {
            background: #eaeaea;
            color: #000;
            font-weight: bold;
        }
        .breadcrumb {
            font-size: 14px;
        }
        .title-section {
            font-size: 28px;
            font-weight: bold;
        }
        .sub-title {
            font-size: 18px;
            margin-top: -8px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <!-- TITLE -->
    <div>
        <div class="title-section">Keuangan & Akuntansi</div>

        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a class="breadcrumb-item text-decoration-none" href="#">Home</a>
            <a class="breadcrumb-item text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">Buku Besar</span>
        </nav>
    </div>

    <!-- FILTER AREA -->
    <div class="card p-4 shadow-sm mb-4">

        <div class="row g-3">

            <div class="col-md-3">
                <label class="fw-bold">Tanggal Awal :</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="fw-bold">Tanggal Akhir :</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-6 d-flex align-items-end gap-2">
                <button class="btn btn-primary">Tampilkan</button>
                <button class="btn btn-info text-white">Export Excel</button>
                <button class="btn btn-warning">Detail Buku Besar</button>
            </div>

        </div>

    </div>

    <!-- TITLE SECTION LIKE IMAGE -->
    <h4 class="mb-3 fw-bold">
        📘 Buku Besar | Tanggal Awal : - , Tanggal Akhir : -
    </h4>

    <!-- TABLE -->
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
                <tr>
                    <td>5/1/2025</td>
                    <td>1207049260</td>
                    <td>0,00</td>
                    <td>0,00</td>
                    <td>1207049260</td>
                </tr>
                <tr>
                    <td>5/1/2025</td>
                    <td>0,00</td>
                    <td>0,00</td>
                    <td>0,00</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <td>5/1/2025l</td>
                    <td>17020000</td>
                    <td>0,00</td>
                    <td>0,00</td>
                    <td>17020000</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
