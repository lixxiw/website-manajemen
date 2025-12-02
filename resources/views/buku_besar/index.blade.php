@extends('layouts.app') 

@section('content')
<div class="container mt-5">
    <h2>Laporan Transaksi Harian (Buku Besar)</h2>
    
    {{-- Form Filter Tanggal --}}
    <div class="card p-3 mb-4 shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-auto">
                <label for="startDate" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="startDate" name="start_date">
            </div>
            <div class="col-auto">
                <label for="endDate" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="endDate" name="end_date">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-info">🔍 Tampilkan</button>
            </div>
        </form>
    </div>

    <div class="card p-3 shadow">
        <table id="bukbesTable" class="table table-bordered table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nomor Akun</th>
                    <th>Nama Akun</th>
                    <th>Saldo Awal</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo Akhir</th>
                </tr>
            </thead>
            {{-- Bagian <tbody> diisi dengan data @foreach dari Controller --}}
            <tbody>
                <tr>
                    <td>2025-05-01</td>
                    <td>1.1.01.01</td>
                    <td>Kas Besar</td>
                    <td>Rp 1.207.049.260</td>
                    <td>Rp 0</td>
                    <td>Rp 0</td>
                    <td>Rp 1.207.049.260</td>
                </tr>
                <tr>
                    <td>2025-05-02</td>
                    <td>1.1.01.01</td>
                    <td>Kas Besar</td>
                    <td>Rp 1.207.049.260</td>
                    <td>Rp 10.000.000</td>
                    <td>Rp 5.000.000</td>
                    <td>Rp 1.212.049.260</td>
                </tr>
                {{-- ... data lainnya dari @foreach ($transactions as $t) --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts') 
<script>
    $(document).ready(function() {
        $('#bukbesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/2.0.8/i18n/id.json" // Bahasa Indonesia
            },
            "pageLength": 25 // Biasanya lebih banyak baris untuk laporan transaksi
        });
    });
</script>
@endpush