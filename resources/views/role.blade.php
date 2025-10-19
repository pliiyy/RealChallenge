@extends('apps.index')
@section('title', 'Roles')

@section('content')
    {{-- @dd($roles) --}}
    <div class="col-lg-10 col-md-9 content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>👥 Data Roles</span>
                <form action="/role" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama role"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#addRoleModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Roles
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Roles</th>
                                <th>Keterangan</th>
                                <th>Izin Akses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <tr>
                                <td>1</td>
                                <td><span class="badge bg-primary">Admin</span></td>
                                <td>Memiliki akses penuh ke seluruh sistem</td>
                                <td>Full Access</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><span class="badge bg-success">Staff</span></td>
                                <td>Hanya akses manajemen data</td>
                                <td>CRUD Data</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><span class="badge bg-warning text-dark">Mahasiswa</span></td>
                                <td>Akses terbatas untuk melihat data pribadi</td>
                                <td>Read Only</td>
                                <td><span class="badge bg-secondary">Nonaktif</span></td>
                                <td>
                                    <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody> --}}
                        @foreach ($roles as $index => $role)
                            <tr>
                                <td>{{ $roles->firstItem() + $index }}</td>
                                <td><span class="badge bg-primary">{{ $role->nama }}</span></td>
                                <td>{{ $role->keterangan }}</td>
                                <td>
                                    @php
                                        // 1. Decode JSON string terluar menjadi array string JSON
                                        $permissions_string_array = json_decode($role->izin_akses, true);
                                    @endphp

                                    @foreach ($permissions_string_array as $perm_string)
                                        @php
                                            // 2. Decode setiap string JSON di dalamnya menjadi array asosiatif
                                            $perm = json_decode($perm_string, true);

                                            // 3. Pisahkan string akses (contoh: "read,create") menjadi array
                                            $akses_array = explode(',', $perm['akses']);

                                            // 4. Ubah huruf pertama setiap akses menjadi besar (Read, Create)
                                            $formatted_akses = array_map('ucfirst', $akses_array);
                                        @endphp

                                        <span class="badge bg-info text-dark me-1 mb-1">
                                            {{-- Tampilkan Nama Izin, lalu gabungkan kembali array akses menjadi string --}}
                                            {{ $perm['nama'] }} - {{ implode(', ', $formatted_akses) }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($role->status == 'AKTIF')
                                        <span class="badge bg-success">{{ ucfirst(strtolower($role->status)) }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst(strtolower($role->status)) }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- Tombol Edit: Memicu modal dan mengirim data role ke fungsi JS/data attributes --}}
                                    <button type="button" class="btn btn-outline-primary btn-sm btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#editRoleModal"
                                        data-id="{{ $role->id }}" data-nama="{{ $role->nama }}"
                                        data-keterangan="{{ $role->keterangan }}"
                                        data-izin-akses='@json(json_decode($role->izin_akses))' {{-- Kirim data JSON yang sudah ter-encode --}}>
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    {{-- Tombol Delete: Memicu modal konfirmasi hapus --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-bs-toggle="modal" data-bs-target="#deleteRoleModal"
                                        data-id="{{ $role->id }}" data-nama="{{ $role->nama }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                                {{-- ... akhir loop ... --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            {{ $roles->links() }}
        </div>

        <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
            <i class="bi bi-info-circle me-2"></i>
            Kelola role pengguna di sini. Role menentukan level izin dan status akses dalam sistem.
        </div>
    </div>
    </div>
    </div>
    <!-- Modal Tambah Role -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="/role" method="POST">
                @csrf
                @method('post')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addRoleModalLabel">Tambah Role Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Role</label>
                        <input type="text" class="form-control" placeholder="Contoh: Admin, Staff, Mahasiswa"
                            name="nama" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Deskripsi singkat role ini" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Izin Akses</label>
                        <div class="border p-3 rounded">

                            {{-- ✅ DASHBOARD --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong class="me-3">Dashboard</strong>
                                <div>
                                    {{-- Nama input sekarang adalah izin_akses[dashboard][] --}}
                                    @php $module = 'dashboard'; @endphp
                                    @foreach (['read', 'create', 'update', 'delete', 'process'] as $perm)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="izin_akses[{{ $module }}][]" value="{{ $perm }}"
                                                id="{{ $module }}_{{ $perm }}">
                                            <label class="form-check-label" for="{{ $module }}_{{ $perm }}">
                                                {{ ucfirst($perm) }}
                                            </label>
                                        </div>
                                    @endforeach
                                    {{-- Hidden input untuk menyimpan path dan nama modul --}}
                                    <input type="hidden" name="izin_info[{{ $module }}][nama]" value="Dashboard">
                                    <input type="hidden" name="izin_info[{{ $module }}][path]" value="/dashboard">
                                </div>
                            </div>

                            {{-- ✅ DATA PENGGUNA --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong class="me-3">Mahasiswa</strong>
                                <div>
                                    {{-- Nama input sekarang adalah izin_akses[dashboard][] --}}
                                    @php $module = 'mahasiswa'; @endphp
                                    @foreach (['read', 'create', 'update', 'delete', 'process'] as $perm)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="izin_akses[{{ $module }}][]" value="{{ $perm }}"
                                                id="{{ $module }}_{{ $perm }}">
                                            <label class="form-check-label"
                                                for="{{ $module }}_{{ $perm }}">
                                                {{ ucfirst($perm) }}
                                            </label>
                                        </div>
                                    @endforeach
                                    {{-- Hidden input untuk menyimpan path dan nama modul --}}
                                    <input type="hidden" name="izin_info[{{ $module }}][nama]" value="Mahasiswa">
                                    <input type="hidden" name="izin_info[{{ $module }}][path]"
                                        value="/mahasiswa">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{-- Form action akan diisi oleh JavaScript --}}
            <form class="modal-content" id="editRoleForm" action="" method="POST">
                @csrf
                @method('PUT') {{-- Gunakan method PUT untuk update --}}
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Role: <span id="edit-role-name"></span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id"> {{-- ID role yang akan diupdate --}}

                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="edit-keterangan" rows="3" name="keterangan"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Izin Akses</label>
                        <div class="border p-3 rounded" id="edit-izin-akses-container">
                            {{-- Isi perizinan akan di-generate oleh JavaScript agar dinamis --}}

                            {{-- ✅ DASHBOARD --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong class="me-3">Dashboard</strong>
                                <div id="edit-dashboard-perms">
                                    @php $module = 'dashboard'; @endphp
                                    @foreach (['read', 'create', 'update', 'delete', 'process'] as $perm)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="izin_akses[{{ $module }}][]" value="{{ $perm }}"
                                                id="edit-{{ $module }}_{{ $perm }}">
                                            <label class="form-check-label"
                                                for="edit-{{ $module }}_{{ $perm }}">
                                                {{ ucfirst($perm) }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="izin_info[{{ $module }}][nama]" value="Dashboard">
                                    <input type="hidden" name="izin_info[{{ $module }}][path]"
                                        value="/dashboard">
                                </div>
                            </div>

                            <hr class="my-2">

                            {{-- ✅ DATA MAHASISWA --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <strong class="me-3">Mahasiswa</strong>
                                <div id="edit-mahasiswa-perms">
                                    @php $module = 'mahasiswa'; @endphp
                                    @foreach (['read', 'create', 'update', 'delete', 'process'] as $perm)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="izin_akses[{{ $module }}][]" value="{{ $perm }}"
                                                id="edit-{{ $module }}_{{ $perm }}">
                                            <label class="form-check-label"
                                                for="edit-{{ $module }}_{{ $perm }}">
                                                {{ ucfirst($perm) }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="izin_info[{{ $module }}][nama]" value="Mahasiswa">
                                    <input type="hidden" name="izin_info[{{ $module }}][path]"
                                        value="/mahasiswa">
                                </div>
                            </div>

                            {{-- Tambahkan modul lain di sini... --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="deleteRoleModal" tabindex="-1" aria-labelledby="deleteRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            {{-- Form action akan diisi oleh JavaScript --}}
            <form class="modal-content" id="deleteRoleForm" action="" method="POST">
                @csrf
                @method('DELETE') {{-- Gunakan method DELETE untuk hapus --}}
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteRoleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus role **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Role Ini</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Tangkap saat tombol edit diklik
            $('.btn-edit').on('click', function() {
                // 1. Ambil data dari data-attributes
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var keterangan = $(this).data('keterangan');
                var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-keterangan').val(keterangan);
                $('#edit-role-name').text(nama); // Tampilkan nama role di header modal

                // 3. Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#editRoleForm').attr('action', '/role/' + id);

                // 4. Proses dan centang checkbox Izin Akses

                // Pertama, hapus centang dari semua checkbox
                $('#editRoleModal input[type="checkbox"]').prop('checked', false);

                if (izinAksesJson) {
                    try {
                        // Decode JSON string terluar menjadi array string JSON
                        var stringArray = JSON.parse(izinAksesJson);

                        stringArray.forEach(function(permString) {
                            // Decode setiap string JSON di dalamnya menjadi objek/array
                            var perm = JSON.parse(permString);


                            // Pisahkan string akses (misal: "read,create")
                            var aksesArray = perm.akses.split(',');

                            // Tentukan modulKey dari nama (sesuaikan dengan nama di form)
                            var moduleKey = perm.nama === 'Dashboard' ? 'dashboard' :
                                perm.nama === 'Mahasiswa' ? 'mahasiswa' : null;

                            if (moduleKey) {
                                aksesArray.forEach(function(akses) {
                                    // Bentuk ID checkbox yang sesuai dan centang
                                    var checkboxId = '#edit-' + moduleKey + '_' + akses
                                        .trim();
                                    $(checkboxId).prop('checked', true);
                                });
                            }
                        });
                    } catch (e) {
                        console.error("Gagal memproses izin akses JSON:", e);
                    }
                }
            });
            $('.btn-delete').on('click', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');

                // Isi data ke dalam form modal
                $('#delete-id').val(id);
                $('#delete-role-name').text(nama);

                // Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#deleteRoleForm').attr('action', '/role/' + id);
            });
        });
    </script>
@endsection
