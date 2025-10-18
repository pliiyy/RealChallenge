<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Aplikasi Saya</title>

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

        .navbar-brand {
            font-weight: 600;
        }

        .profile-card {
            background: #fff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            margin-bottom: 15px;
        }

        .profile-header h4 {
            font-weight: 600;
        }

        .info-label {
            font-weight: 500;
            color: #4f46e5;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79,70,229,0.25);
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
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
                    <a class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    <a class="nav-link active"><i class="bi bi-person me-2"></i> Profil</a>
                    <a href="#" class="nav-link"><i class="bi bi-folder2-open me-2"></i> Data</a>
                    <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9 p-4">
                <div class="profile-card mx-auto" style="max-width: 800px;">
                    <!-- Header -->
                    <div class="profile-header">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->name ?? 'user' }}" alt="Foto Profil">
                        <h4>{{ auth()->user()->name ?? 'Nama Pengguna' }}</h4>
                        <p class="text-white-50 mb-0">{{ auth()->user()->email ?? 'email@contoh.com' }}</p>
                    </div>

                    <!-- Body -->
                    <div class="p-4">
                        <h5 class="mb-3 text-primary fw-semibold">Informasi Pribadi</h5>
                        <form method="POST" action="#">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="info-label mb-1">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="info-label mb-1">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="info-label mb-1">No. Telepon</label>
                                    <input type="text" name="phone" class="form-control" placeholder="0812-3456-7890">
                                </div>
                                <div class="col-md-6">
                                    <label class="info-label mb-1">Alamat</label>
                                    <input type="text" name="address" class="form-control" placeholder="Jl. Mawar No. 123">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="info-label mb-1">Tentang Saya</label>
                                    <textarea class="form-control" rows="3" placeholder="Tuliskan sesuatu tentang dirimu..."></textarea>
                                </div>
                            </div>

                            <div class="mt-4 text-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
