@extends('apps.index')
@section('title', 'Pengaturan')

@section('content')
<div class="col-lg-10 col-md-9 content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>📄 Surat Tugas Mengajar</span>
                    <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addSuratModal">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Surat Tugas
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dosen</th>
                                    <th>Mata Kuliah</th>
                                    <th>Jadwal</th>
                                    <th>Hari</th>
                                    <th>Ruangan</th>
                                    <th>Surat Tugas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dr. Andi Saputra</td>
                                    <td>Pemrograman Web</td>
                                    <td>08.00 - 10.00</td>
                                    <td>Senin</td>
                                    <td>Ruang A1</td>
                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-file-earmark-pdf"></i> Lihat</a></td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Prof. Siti Rahmawati</td>
                                    <td>Ekonomi Mikro</td>
                                    <td>10.00 - 12.00</td>
                                    <td>Selasa</td>
                                    <td>Ruang B2</td>
                                    <td><a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-file-earmark-pdf"></i> Lihat</a></td>
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
                Daftar surat tugas mengajar yang telah diterbitkan untuk setiap dosen.
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Surat -->
<div class="modal fade" id="addSuratModal" tabindex="-1" aria-labelledby="addSuratModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addSuratModalLabel">Tambah Surat Tugas Mengajar</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Dosen</label>
                    <select class="form-select">
                        <option>Dr. Andi Saputra</option>
                        <option>Prof. Siti Rahmawati</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mata Kuliah</label>
                    <select class="form-select">
                        <option>Pemrograman Web</option>
                        <option>Ekonomi Mikro</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Hari</label>
                    <select class="form-select">
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Jam</label>
                    <input type="text" class="form-control" placeholder="08.00 - 10.00">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ruangan</label>
                    <select class="form-select">
                        <option>Ruang A1</option>
                        <option>Ruang B2</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Unggah Surat Tugas (PDF)</label>
                    <input type="file" class="form-control">
                </div>
                <div class="col-md-6">
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
