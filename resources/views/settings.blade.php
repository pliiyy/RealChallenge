@extends('apps.index')
@section('title', 'Pengaturan')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="card mb-4">
            <div class="card-header">
                ⚙️ Pengaturan Akun
            </div>
            <div class="card-body">
                <form action="/settings" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->Biodata->nama }}"
                                name="nama">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Password Lama</label>
                            <input type="password" class="form-control" placeholder="" name="password_lama">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password Baru</label>
                            <input type="password" class="form-control" placeholder="" name="password_baru">
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
@endsection
