@extends('apps.index')
@section('title', 'Data')

@section('content')
    <!-- Content -->
            <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>📋 Data Pengguna</span>
                        <button class="btn btn-light btn-sm text-primary fw-semibold">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Ani Setiawan</td>
                                        <td>ani@example.com</td>
                                        <td><span class="badge bg-primary">Admin</span></td>
                                        <td>10 Oktober 2025</td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Budi Pratama</td>
                                        <td>budi@example.com</td>
                                        <td><span class="badge bg-success">User</span></td>
                                        <td>12 Oktober 2025</td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Citra Dewi</td>
                                        <td>citra@example.com</td>
                                        <td><span class="badge bg-warning text-dark">Moderator</span></td>
                                        <td>15 Oktober 2025</td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <nav>
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled"><a class="page-link">‹</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">›</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="alert alert-info bg-opacity-25 border-0 text-primary">
                        <i class="bi bi-info-circle me-2"></i> 
                        Kamu dapat mengelola data pengguna di sini. Gunakan tombol <strong>Edit</strong> atau <strong>Hapus</strong> untuk memodifikasi data.
                    </div>
                </div>
            </div>
        </div>
@endsection