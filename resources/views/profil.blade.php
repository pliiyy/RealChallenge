@extends('apps.index')
@section('title', 'Prodi')

@section('content')
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
@endsection
