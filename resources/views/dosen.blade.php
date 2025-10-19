@extends('apps.index')
@section('title', 'Dosen')
@section('content')
 <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>👨‍🏫 Data Dosen</span>
                         <form action="/matakuliah" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama dosen"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addDosenModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Dosen
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIDN</th>
                                        <th>Nama Dosen</th>
                                        <th>Fakultas</th>
                                        <th>Program Studi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1234567890</td>
                                        <td>Dr. Ir. Bambang Santoso, M.T.</td>
                                        <td>Teknik</td>
                                        <td>Teknik Informatika</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>9876543210</td>
                                        <td>Dr. Siti Aminah, M.Kom</td>
                                        <td>Ilmu Komputer</td>
                                        <td>Sistem Informasi</td>
                                        <td><span class="badge bg-secondary">Cuti</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
                    <i class="bi bi-info-circle me-2"></i>
                    Halaman ini digunakan untuk mengelola data dosen aktif maupun non-aktif.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Dosen -->
    <div class="modal fade" id="addDosenModal" tabindex="-1" aria-labelledby="addDosenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addDosenModalLabel">Tambah Dosen Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" placeholder="Contoh: 1234567890">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" placeholder="Contoh: Dr. Bambang Santoso, M.T.">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <select class="form-select">
                            <option value="">-- Pilih Fakultas --</option>
                            <option>Teknik</option>
                            <option>Ekonomi</option>
                            <option>Ilmu Komputer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select class="form-select">
                            <option value="">-- Pilih Prodi --</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Aktif</option>
                            <option>Cuti</option>
                            <option>Pensiun</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="addKelasModal" tabindex="-1" aria-labelledby="addKelasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="/prodi" method="POST">
                @csrf
                @method('post')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah Dosen Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="nidn">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fakultas</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="fakultas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="programstudi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">status</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="status">
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
                        <label for="edit-nidn" class="form-label">NIDN</label>
                        <input class="form-control" id="edit-nidn" name="nidn"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-fakultas" class="form-label">Fakultas</label>
                        <input class="form-control" id="edit-fakultas" name="fakultas"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus Dosen ini? **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Dosen Ini</button>
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
                var nidn = $(this).data('nidn');
                var nama = $(this).data('nama');
                var programstudi = $(this).data('programstudi');
                var status = $(this).data('status');
            
                // var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nidn').val(nidn);
                $('#edit-nama').val(nama);
                $('#edit-fakultas').val(fakultas);
                $('#edit-programstudi').val(programstudi);
                $('#edit-status').val(status);
                $('#edit-role-name').text(nama); // Tampilkan nama role di header modal

                // 3. Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#editRoleForm').attr('action', '/dosen/' + id);

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
                $('#deleteRoleForm').attr('action', '/dosen/' + id);
            });
        });
    </script>

@endsection
