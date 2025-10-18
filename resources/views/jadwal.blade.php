<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal - Aplikasi Saya</title>

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
                    <a href="#" class="nav-link active"><i class="bi bi-clock-history me-2"></i> Data Jadwal</a>
                    <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

            <!-- Content -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
