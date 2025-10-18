<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data - Aplikasi Saya</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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

        .table thead {
            background-color: #eef2ff;
            color: #4f46e5;
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .btn-outline-primary {
            border-color: #4f46e5;
            color: #4f46e5;
        }

        .btn-outline-primary:hover {
            background-color: #4f46e5;
            color: white;
        }

        @media (max-width: 992px) {
            .sidebar {
                min-height: auto;
            }
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
                    <a href class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <a href class="nav-link"><i class="bi bi-person me-2"></i> Profil</a>
                    <a href class="nav-link active"><i class="bi bi-folder2-open me-2"></i> Data</a>
                    <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
