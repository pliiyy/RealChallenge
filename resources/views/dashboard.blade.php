@extends('apps.index')
@section('title', 'Dashboard')

@section('content')
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
@endsection