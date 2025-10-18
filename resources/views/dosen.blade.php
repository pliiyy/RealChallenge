@extends('apps.index')
@section('title', 'Dosen')
@section('content')
<!-- Content -->
<div class="col-lg-10 col-md-9 content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>👨‍🏫 Data Dosen</span>
            <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addDosenModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Dosen
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIDN</th>
                            <th>Nama Dosen</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123456789</td>
                            <td>Dr. Andi Saputra</td>
                            <td>Teknik</td>
                            <td>Teknik Informatika</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>987654321</td>
                            <td>Prof. Siti Rahmawati</td>
                            <td>Ekonomi</td>
                            <td>Manajemen</td>
                            <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
        <i class="bi bi-info-circle me-2"></i>
        Kelola data dosen untuk setiap fakultas dan program studi.
    </div>
</div>
</div>
</div>

<!-- Modal Tambah Dosen -->
<div class="modal fade" id="addDosenModal" tabindex="-1" aria-labelledby="addDosenModalLabel" aria-hidden="true">
<div class="modal-dialog">
<form class="modal-content">
    <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addDosenModalLabel">Tambah Dosen Baru</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">NIDN</label>
            <input type="text" class="form-control" placeholder="Masukkan NIDN">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" placeholder="Masukkan nama dosen">
        </div>
        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select class="form-select">
                <option>Teknik</option>
                <option>Ekonomi</option>
                <option>Pendidikan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select class="form-select">
                <option>Teknik Informatika</option>
                <option>Manajemen</option>
                <option>Pendidikan Matematika</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select">
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>
</div>
@endsection

