@extends('apps.index')
@section('title', 'Roles')

@section('content')
<div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>👥 Data Roles</span>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Roles
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Roles</th>
                                        <th>Keterangan</th>
                                        <th>Izin Akses</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><span class="badge bg-primary">Admin</span></td>
                                        <td>Memiliki akses penuh ke seluruh sistem</td>
                                        <td>Full Access</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><span class="badge bg-success">Staff</span></td>
                                        <td>Hanya akses manajemen data</td>
                                        <td>CRUD Data</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><span class="badge bg-warning text-dark">Mahasiswa</span></td>
                                        <td>Akses terbatas untuk melihat data pribadi</td>
                                        <td>Read Only</td>
                                        <td><span class="badge bg-secondary">Nonaktif</span></td>
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
                    Kelola role pengguna di sini. Role menentukan level izin dan status akses dalam sistem.
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Role -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="/roles" method="POST">
                @csrf
                @method("post")
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addRoleModalLabel">Tambah Role Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="mb-3 none">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" placeholder="Contoh: Admin, Staff, Mahasiswa" name="status" value="AKTIF">
                    </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Role</label>
                        <input type="text" class="form-control" placeholder="Contoh: Admin, Staff, Mahasiswa" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi singkat role ini" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
            <label class="form-label">Izin Akses</label>
            
            <div class="border p-3 rounded">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="me-3">Dashboard</strong>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardRead">
                            <label class="form-check-label" for="dashboardRead">Baca</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardCreate">
                            <label class="form-check-label" for="dashboardCreate">Buat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardUpdate">
                            <label class="form-check-label" for="dashboardUpdate">Ubah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardDelete">
                            <label class="form-check-label" for="dashboardDelete">Hapus</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardDelete">
                            <label class="form-check-label" for="dashboardDelete">Proses</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="me-3">Data Pengguna</strong>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="userDataRead" name="userDataRead">
                            <label class="form-check-label" for="userDataRead">Baca</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="userDataCreate" name="userDataCreate">
                            <label class="form-check-label" for="userDataCreate">Buat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="userDataUpdate">
                            <label class="form-check-label" for="userDataUpdate">Ubah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="userDataDelete">
                            <label class="form-check-label" for="userDataDelete">Hapus</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="dashboardDelete">
                            <label class="form-check-label" for="dashboardDelete">Proses</label>
                        </div>
                    </div>
                </div>
                
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
