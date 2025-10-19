@extends('apps.index')
@section('title', 'Prodi')

@section('content')

<div class="col-lg-10 col-md-9 content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-journal-text me-2"></i>Data Prodi</h5>
             <form action="/prodi" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama prodi"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            <button class="btn btn-light btn-sm text-primary fw-semibold">
                <i class="bi bi-plus-circle me-1"></i> Tambah Prodi
            </button>
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Prodi</th>
                        <th>Kode</th>
                        <th>Fakultas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Teknik Informatika</td>
                        <td>TI01</td>
                        <td>Fakultas Teknik</td>
                        <td><span class="badge badge-active">Aktif</span></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Manajemen</td>
                        <td>MJ02</td>
                        <td>Fakultas Ekonomi</td>
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
 <div class="modal fade" id="addKelasModal" tabindex="-1" aria-labelledby="addKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="/prodi" method="POST">
                @csrf
                @method('post')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah prodi Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama prodi</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="kode">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="fakultas">
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
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Prodi: <span id="edit-role-name"></span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id"> {{-- ID role yang akan diupdate --}}

                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Prodi</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-kode" class="form-label">Kode</label>
                        <input class="form-control" id="edit-kode" name="kode"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-fakultas" class="form-label">Fakultas</label>
                        <input class="form-control" id="edit-fakultas" name="fakultas"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus Prodi ini? **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Prodi Ini</button>
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
                var kode = $(this).data('kode');
                var fakultas = $(this).data('fakultas');
                // var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-kode').val(kode);
                $('#edit-fakultas').val(fakultas);
                $('#edit-role-name').text(nama); // Tampilkan nama role di header modal

                // 3. Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#editRoleForm').attr('action', '/prodi/' + id);

                // 4. Proses dan centang checkbox Izin Akses

                // Pertama, hapus centang dari semua checkbox
                // $('#editRoleModal input[type="checkbox"]').prop('checked', false);

                // if (izinAksesJson) {
                //     try {
                //         // Decode JSON string terluar menjadi array string JSON
                //         var stringArray = JSON.parse(izinAksesJson);

                //         stringArray.forEach(function(permString) {
                //             // Decode setiap string JSON di dalamnya menjadi objek/array
                //             var perm = JSON.parse(permString);


                //             // Pisahkan string akses (misal: "read,create")
                //             var aksesArray = perm.akses.split(',');

                //             // Tentukan modulKey dari nama (sesuaikan dengan nama di form)
                //             var moduleKey = perm.nama === 'Dashboard' ? 'dashboard' :
                //                 perm.nama === 'Mahasiswa' ? 'mahasiswa' : null;

                //             if (moduleKey) {
                //                 aksesArray.forEach(function(akses) {
                //                     // Bentuk ID checkbox yang sesuai dan centang
                //                     var checkboxId = '#edit-' + moduleKey + '_' + akses
                //                         .trim();
                //                     $(checkboxId).prop('checked', true);
                //                 });
                //             }
                //         });
                //     } catch (e) {
                //         console.error("Gagal memproses izin akses JSON:", e);
                //     }
                // }
            });
            $('.btn-delete').on('click', function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');

                // Isi data ke dalam form modal
                $('#delete-id').val(id);
                $('#delete-role-name').text(nama);

                // Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#deleteRoleForm').attr('action', '/prodi/' + id);
            });
        });
    </script>
@endsection

