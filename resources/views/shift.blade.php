@extends('apps.index')
@section('title', 'Ruangan')

@section('content')
<div class="col-lg-10 col-md-9 content">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>🕒 Data Shift Mengajar</span>
                    <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addShiftModal">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Shift
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Shift</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Shift Pagi</td>
                                    <td>07:00</td>
                                    <td>12:00</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i> Edit</button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Shift Siang</td>
                                    <td>13:00</td>
                                    <td>17:00</td>
                                    <td><span class="badge bg-secondary">Nonaktif</span></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i> Edit</button>
                                        <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
                <i class="bi bi-info-circle me-2"></i>
                Kelola waktu shift mengajar untuk dosen sesuai kebutuhan jadwal kampus.
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Shift -->
<div class="modal fade" id="addShiftModal" tabindex="-1" aria-labelledby="addShiftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addShiftModalLabel">Tambah Shift Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Shift</label>
                    <input type="text" class="form-control" placeholder="Shift Pagi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Mulai</label>
                    <input type="time" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jam Selesai</label>
                    <input type="time" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
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

