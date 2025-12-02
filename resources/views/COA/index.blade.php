@extends('layouts.app') 

@section('content')
<div class="container mt-5">
    <h2>Master Akun (Chart of Accounts)</h2>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="#" class="btn btn-primary">➕ Tambah Akun Baru</a>
        <a href="#" class="btn btn-success">⬇️ Export COA</a>
    </div>

    <div class="card p-3 shadow">
        <table id="coaTable" class="table table-bordered table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID Akun</th>
                    <th>Nomor Akun</th>
                    <th>Nama Akun</th>
                    <th>Posisi Normal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            {{-- Bagian <tbody> diisi dengan data @foreach dari Controller --}}
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1.1.01.01</td>
                    <td>Kas Besar</td>
                    <td>Debit</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>1.1.02.01</td>
                    <td>BCA - XXX</td>
                    <td>Debit</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </td>
                </tr>
                {{-- ... data lainnya dari @foreach ($coas as $coa) --}}
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts') 
<script>
    $(document).ready(function() {
        $('#coaTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/2.0.8/i18n/id.json" // Bahasa Indonesia
            },
            "pageLength": 10
        });
    });
</script>
@endpush