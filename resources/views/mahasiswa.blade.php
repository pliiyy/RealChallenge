@extends('apps.index')
@section('title', 'Mahasiswa')

@section('content')
 <div class="col-lg-10 col-md-9 content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>🎓 Data Mahasiswa</span>
                    <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addMahasiswaModal">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Program Studi</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>230101001</td>
                                    <td>Budi Santoso</td>
                                    <td>Teknik Informatika</td>
                                    <td>2023</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>230101002</td>
                                    <td>Siti Aminah</td>
                                    <td>Sistem Informasi</td>
                                    <td>2022</td>
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
                Kelola data mahasiswa sesuai program studi dan status akademik.
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mahasiswa -->
<div class="modal fade" id="addMahasiswaModal" tabindex="-1" aria-labelledby="addMahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addMahasiswaModalLabel">Tambah Mahasiswa Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" placeholder="Masukkan NIM">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select class="form-select">
                        <option>Teknik Informatika</option>
                        <option>Sistem Informasi</option>
                        <option>Manajemen Informatika</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="number" class="form-control" placeholder="Contoh: 2023">
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

