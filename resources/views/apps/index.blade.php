<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

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
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
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

        .profile-card {
            background: #fff;
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
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
    </style>
</head>

<body>
    {{-- SweetAlert Notifikasi --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2500
            })
        </script>
    @endif

    @if ($errors->any())
        <script>
            let errorMessages = `{!! implode('<br>', $errors->all()) !!}`;
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal!',
                html: errorMessages,
                confirmButtonText: 'OK',
                confirmButtonColor: '#d33'
            })
        </script>
    @endif
    <nav class="navbar navbar-dark">
        <div class="container-fluid px-4">
            <span class="navbar-brand">Aplikasi Kampus</span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">Halo, {{ auth()->user()->name ?? 'Admin' }} 👋</span>
                <form method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            {{-- <div class="col-lg-2 col-md-3 p-3 sidebar">
            <nav class="nav flex-column">
                <a href="#data" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="bi bi-person me-2"></i> Profil</a>
                <a href="#" class="nav-link"><i class="bi bi-building me-2"></i> Data Fakultas</a>
                <a href="#" class="nav-link"><i class="bi bi-mortarboard me-2"></i> Data Prodi</a>
                <a href="#" class="nav-link"><i class="bi bi-person-gear me-2"></i> Data Role</a>
                <a href="#" class="nav-link"><i class="bi bi-calendar3 me-2"></i> Data Semester</a>
                <a href="#" class="nav-link"><i class="bi bi-journal-bookmark me-2"></i> Data Mata Kuliah</a>
                <a href="#" class="nav-link"><i class="bi bi-clock-history me-2"></i> Data Jadwal</a>
                <a href="#" class="nav-link"><i class="bi bi-door-closed me-2"></i> Data Ruangan</a>
                <a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Data Kelas</a>
                <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> Data Mahasiswa</a>
                <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Surat Tugas Mengajar</a>
                <a href="#" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>

            </nav>
        </div> --}}
            <div class="col-lg-2 col-md-3 p-3 sidebar  border-end vh-100">
                <nav class="nav flex-column">
                    <!-- Dashboard -->
                    <a href="#data" class="nav-link">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>

                    <!-- Profil -->
                    <a href="#" class="nav-link">
                        <i class="bi bi-person me-2"></i> Profil
                    </a>

                    <!-- Data Master (Nested Menu) -->
                    <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        href="#dataMaster" role="button" aria-expanded="false" aria-controls="dataMaster">
                        <span><i class="bi bi-folder2-open me-2"></i> Data</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse ps-3" id="dataMaster">
                        <a href="#" class="nav-link"><i class="bi bi-building me-2"></i> Fakultas</a>
                        <a href="#" class="nav-link"><i class="bi bi-mortarboard me-2"></i> Prodi</a>
                        <a href="#" class="nav-link"><i class="bi bi-person-gear me-2"></i> Role</a>
                        <a href="#" class="nav-link"><i class="bi bi-calendar3 me-2"></i> Semester</a>
                        <a href="#" class="nav-link"><i class="bi bi-journal-bookmark me-2"></i> Mata Kuliah</a>
                        <a href="#" class="nav-link"><i class="bi bi-clock-history me-2"></i> Jadwal</a>
                        <a href="#" class="nav-link"><i class="bi bi-door-closed me-2"></i> Ruangan</a>
                        <a href="#" class="nav-link"><i class="bi bi-people me-2"></i> Kelas</a>
                        <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> Mahasiswa</a>
                        <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> Dosen</a>
                        <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> Dekan</a>
                    </div>
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear me-2"></i> Surat Tugas Mengajar
                    </a>
                    <!-- Pengaturan -->
                    <a href="#" class="nav-link">
                        <i class="bi bi-gear me-2"></i> Pengaturan
                    </a>
                </nav>
            </div>

            <!-- Content -->
            @yield('content')
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
