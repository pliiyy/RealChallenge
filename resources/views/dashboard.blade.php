<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Saya</title>

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
            color: #333;
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
            transition: all 0.3s ease;
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
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .card-title {
            font-weight: 600;
        }

        .logout-btn {
            border: none;
            background: none;
            color: #fff;
            font-size: 1rem;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0 h1 fw-semibold">Aplikasi Saya</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">Halo, {{ auth()->user()->name ?? 'Pengguna' }} 👋</span>
                <form method="POST" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-3 sidebar">
                <nav class="nav flex-column">
                    <a href="#" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <a href="#" class="nav-link"><i class="bi bi-person me-2"></i> Profil</a>
                    <a href="#" class="nav-link"><i class="bi bi-folder2-open me-2"></i> Data</a>
                    <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content">
                <h2 class="fw-semibold mb-4 text-primary">Dashboard </h2>

                <div class="row g-4 mt-4">
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                                    <i class="bi bi-people fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Pengguna</h5>
                                    <p class="card-text text-muted mb-0">124 terdaftar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                                    <i class="bi bi-file-earmark-text fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Laporan</h5>
                                    <p class="card-text text-muted mb-0">32 laporan baru</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="d-flex align-items-center">
                                <div class="icon bg-warning bg-opacity-10 text-warning rounded-3 p-3 me-3">
                                    <i class="bi bi-bell fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-1">Notifikasi</h5>
                                    <p class="card-text text-muted mb-0">5 pesan belum dibaca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h5 class="fw-semibold mb-3 text-primary">Aktivitas Terbaru</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Login berhasil - {{ auth()->user()->name ?? 'User' }}
                            <span class="badge bg-primary rounded-pill">Baru saja</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pembaruan profil
                            <span class="badge bg-secondary rounded-pill">10 menit lalu</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mengunduh laporan
                            <span class="badge bg-secondary rounded-pill">1 jam lalu</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
