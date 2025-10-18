@extends('apps.index')
@section('title', 'Jadwal')

@section('content')
            <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>🕒 Data Jadwal Perkuliahan</span>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addJadwalModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mata Kuliah</th>
                                        <th>Dosen</th>
                                        <th>Ruangan</th>
                                        <th>Kelas</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pemrograman Web</td>
                                        <td>Dr. Andi Rahman</td>
                                        <td>Lab 3</td>
                                        <td>TI-5A</td>
                                        <td>Senin</td>
                                        <td>08:00 - 10:00</td>
                                        <td>Ganjil 2025</td>
                                        <td>2025/2026</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Struktur Data</td>
                                        <td>Dr. Siti Marlina</td>
                                        <td>Ruang B-202</td>
                                        <td>SI-3B</td>
                                        <td>Rabu</td>
                                        <td>10:00 - 12:00</td>
                                        <td>Genap 2024</td>
                                        <td>2024/2025</td>
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
                    Kelola jadwal perkuliahan dengan memastikan tidak ada bentrok antar waktu dan ruangan.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="addJadwalModal" tabindex="-1" aria-labelledby="addJadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addJadwalModalLabel">Tambah Jadwal Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select">
                            <option>Pemrograman Web</option>
                            <option>Struktur Data</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dosen</label>
                        <select class="form-select">
                            <option>Dr. Andi Rahman</option>
                            <option>Dr. Siti Marlina</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ruangan</label>
                        <input type="text" class="form-control" placeholder="Contoh: Lab 3">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" placeholder="Contoh: TI-5A">
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
                    <div class="col-md-6">
                        <label class="form-label">Jam</label>
                        <input type="text" class="form-control" placeholder="08:00 - 10:00">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Semester</label>
                        <select class="form-select">
                            <option>Ganjil 2025</option>
                            <option>Genap 2024</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" placeholder="2025/2026">
                    </div>
                    <div class="col-md-12">
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

