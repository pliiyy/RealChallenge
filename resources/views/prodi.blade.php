@extends('apps.index')
@section('title', 'Prodi')

@section('content')

<div class="col-lg-10 col-md-9 content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Data Prodi</h5>
            <button class="btn btn-light btn-sm text-primary fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Prodi
            </button>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Prodi</th>
                        <th>Kode</th>
                        <th>Fakultas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Teknik Informatika</td>
                        <td>TI01</td>
                        <td>Fakultas Teknik</td>
                        <td><span class="badge badge-active">Aktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manajemen</td>
                        <td>MJ02</td>
                        <td>Fakultas Ekonomi</td>
                        <td><span class="badge badge-inactive">Nonaktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

