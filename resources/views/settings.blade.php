<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Aplikasi Saya</title>

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

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.2);
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .form-check-input:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
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
                    <a href class="nav-link"><i class="bi bi-folder2-open me-2"></i> Data</a>
                    <a href class="nav-link active"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

            <!-- Content -->
            <div class="col-lg-10 col-md-9 content">
                <div class="card mb-4">
                    <div class="card-header">
                        ⚙️ Pengaturan Akun
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="Budi Pratama">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="budi@example.com">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" placeholder="••••••••">
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        🔔 Pengaturan Notifikasi
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notifEmail" checked>
                                <label class="form-check-label" for="notifEmail">
                                    Kirim notifikasi melalui Email
                                </label>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="notifSystem">
                                <label class="form-check-label" for="notifSystem">
                                    Tampilkan notifikasi di dalam sistem
                                </label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="notifPromo">
                                <label class="form-check-label" for="notifPromo">
                                    Terima informasi promosi & pembaruan
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-bell me-1"></i> Simpan Notifikasi
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        🎨 Tema Tampilan
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row align-items-center mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Mode Tampilan</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-select">
                                        <option>Terang (Light)</option>
                                        <option>Gelap (Dark)</option>
                                        <option>Otomatis (Sesuai Sistem)</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-palette me-1"></i> Terapkan Tema
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
                    <i class="bi bi-info-circle me-2"></i>
                    Semua perubahan pengaturan akan otomatis disimpan di profil Anda.
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
