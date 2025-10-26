@extends('apps.index')
@section('title', 'Dashboard')

@section('content')
    <div class="col-md-9 col-lg-10 content">
        <h2 class="fw-semibold mb-4 text-primary">Dashboard</h2>

        {{-- Kartu Pengguna, Notifikasi, dan Pengaturan --}}
        <div class="row g-4 mt-4">
            <!-- Card Pengguna -->
            <div class="col-md-4">
                <div class="card p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Pengguna</h5>
                            <p class="card-text text-muted mb-0">{{ $user->count() }} terdaftar</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Notifikasi -->
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

            <!-- Card Pengaturan -->
            <div class="col-md-4">
                <div class="card p-4">
                    <div class="d-flex align-items-center">
                        <div class="icon bg-success bg-opacity-10 text-success rounded-3 p-3 me-3">
                            <i class="bi bi-gear fs-4"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Pengaturan</h5>
                            <p class="card-text text-muted mb-0">Kelola preferensi akun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kartu Data Mahasiswa --}}
        <div class="card p-4 mt-4">
            <h5 class="fw-semibold text-secondary mb-3">Data Mahasiswa</h5>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <p class="fw-semibold mb-1 text-muted">Nama</p>
                    <p class="mb-0">{{ $mahasiswa->nama ?? 'Rafly Adrian Firmansyah' }}</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <p class="fw-semibold mb-1 text-muted">NIM</p>
                    <p class="mb-0">{{ $mahasiswa->nim ?? '242505017' }}</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <p class="fw-semibold mb-1 text-muted">Prodi</p>
                    <p class="mb-0">{{ $mahasiswa->prodi ?? 'S1 - Sistem Informasi' }}</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <p class="fw-semibold mb-1 text-muted">Jenis Kelas</p>
                    <p class="mb-0">{{ $mahasiswa->jenis_kelas ?? 'Reguler' }}</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <p class="fw-semibold mb-1 text-muted">Semester</p>
                    <p class="mb-0">{{ $mahasiswa->semester ?? '3' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
