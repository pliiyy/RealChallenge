<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas - Aplikasi Saya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7ff;
        }

        .navbar {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
        }

        .sidebar {
            background: #4f46e5;
            min-height: 100vh;
            color: white;
        }

        .sidebar .nav-link {
            color: #d1d5db;
            border-radius: 8px;
            margin-bottom: 6px;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #6366f1;
            color: #fff;
        }

        .content {
            padding: 30px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }

        .card-header {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            font-weight: 600;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .table thead {
            background-color: #eef2ff;
            color: #4f46e5;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid px-4">
            <span class="navbar-brand">Aplikasi Saya</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">Halo, {{ auth()->user()->name ?? 'Pengguna' }} 👋</span>
                <form method="POST" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 p-3 sidebar">
                <nav class="nav flex-column">
                    <a href="#" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <a href="#" class="nav-link"><i class="bi bi-person me-2"></i> Profil</a>
                    <a href="#" class="nav-link"><i class="bi bi-folder2-open me-2"></i> Data</a>
                    <a href="#" class="nav-link"><i class="bi bi-building me-2"></i> Data Fakultas</a>
                    <a href="#" class="nav-link"><i class="bi bi-mortarboard me-2"></i> Data Prodi</a>
                    <a href="#" class="nav-link"><i class="bi bi-person-gear me-2"></i> Data Role</a>
                    <a href="#" class="nav-link"><i class="bi bi-calendar3 me-2"></i> Data Semester</a>
                    <a href="#" class="nav-link"><i class="bi bi-journal-bookmark me-2"></i> Data Mata Kuliah</a>
                    <a href="#" class="nav-link"><i class="bi bi-clock-history me-2"></i> Data Jadwal</a>
                    <a href="#" class="nav-link"><i class="bi bi-door-closed me-2"></i> Data Ruangan</a>
                    <a href="#" class="nav-link active"><i class="bi bi-people me-2"></i> Data Kelas</a>
                    <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

            <!-- Content -->
            <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>🏫 Data Kelas</span>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addKelasModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Kelas
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th>Kapasitas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kelas A</td>
                                        <td>40</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kelas B</td>
                                        <td>35</td>
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
                    Kelola data kelas untuk pengaturan jumlah mahasiswa dan kapasitas.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="addKelasModal" tabindex="-1" aria-labelledby="addKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah Kelas Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
