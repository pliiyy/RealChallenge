<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fakultas</title>

    <!-- Bootstrap -->
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
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .card-header {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: white;
            font-weight: 600;
        }
        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4338ca;
        }
        .badge-active {
            background-color: #10b981;
        }
        .badge-inactive {
            background-color: #ef4444;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-building me-2"></i>Data Fakultas</h5>
            <button class="btn btn-light btn-sm text-primary fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Fakultas
            </button>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Fakultas</th>
                        <th>Kode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Fakultas Teknik</td>
                        <td>FT01</td>
                        <td><span class="badge badge-active">Aktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Fakultas Ekonomi</td>
                        <td>FE02</td>
                        <td><span class="badge badge-inactive">Nonaktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
