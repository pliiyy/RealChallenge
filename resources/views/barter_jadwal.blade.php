@extends('apps.index')
@section('title', 'Dashboard')

@section('content')
 <div class="col-lg-10 col-md-9 content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>🔄 Barter Jadwal Mengajar</span>
                    <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addBarterModal">
                        <i class="bi bi-plus-circle me-1"></i> Ajukan Barter
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pemohon</th>
                                    <th>Jadwal Sebelumnya</th>
                                    <th>Jadwal yang Diminta</th>
                                    <th>Kepada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dr. Andi Saputra</td>
                                    <td>Senin, 08.00-10.00 (Pemrograman Web)</td>
                                    <td>Rabu, 10.00-12.00</td>
                                    <td>Prof. Siti Rahmawati</td>
                                    <td><span class="badge bg-warning text-dark">Menunggu</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i> Update</button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        <button class="btn btn-outline-success btn-sm"><i class="bi bi-check2-circle"></i> Proses</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Prof. Siti Rahmawati</td>
                                    <td>Selasa, 08.00-10.00 (Ekonomi Mikro)</td>
                                    <td>Kamis, 14.00-16.00</td>
                                    <td>Dr. Andi Saputra</td>
                                    <td><span class="badge bg-success">Disetujui</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i> Update</button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-clock"></i> Proses</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
                <i class="bi bi-info-circle me-2"></i>
                Ajukan pertukaran jadwal mengajar antar dosen di sini. Status menunjukkan progres pengajuan.
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Barter -->
<div class="modal fade" id="addBarterModal" tabindex="-1" aria-labelledby="addBarterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addBarterModalLabel">Ajukan Barter Jadwal</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body row g-3">
                <div class="col-md-6">
                    <label class="form-label">Pemohon</label>
                    <select class="form-select">
                        <option>Dr. Andi Saputra</option>
                        <option>Prof. Siti Rahmawati</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kepada</label>
                    <select class="form-select">
                        <option>Prof. Siti Rahmawati</option>
                        <option>Dr. Andi Saputra</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jadwal Sebelumnya</label>
                    <input type="text" class="form-control" placeholder="Senin, 08.00-10.00 (Pemrograman Web)">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jadwal yang Diminta</label>
                    <input type="text" class="form-control" placeholder="Rabu, 10.00-12.00">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Menunggu</option>
                        <option>Disetujui</option>
                        <option>Ditolak</option>
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
