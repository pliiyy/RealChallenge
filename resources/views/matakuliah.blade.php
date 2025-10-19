@extends('apps.index')
@section('title', 'Matakuliah')

@section('content')
 <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>📘 Data Mata Kuliah</span>
                        <form action="/matakuliah" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama matakuliah"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addMatkulModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Mata Kuliah
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Kode</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                        <th>Program Studi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pemrograman Web</td>
                                        <td>PW101</td>
                                        <td>3</td>
                                        <td>Semester 5</td>
                                        <td>Teknik Informatika</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Struktur Data</td>
                                        <td>SD202</td>
                                        <td>4</td>
                                        <td>Semester 3</td>
                                        <td>Sistem Informasi</td>
                                        <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
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
                    Kelola data mata kuliah di sini. Pastikan SKS dan status aktif sesuai dengan kurikulum.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Mata Kuliah -->
    <div class="modal fade" id="addMatkulModal" tabindex="-1" aria-labelledby="addMatkulModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addMatkulModalLabel">Tambah Mata Kuliah Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" placeholder="Contoh: Pemrograman Web">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" placeholder="Contoh: PW101">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" class="form-control" placeholder="Contoh: 3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <select class="form-select">
                            <option>Semester 1</option>
                            <option>Semester 2</option>
                            <option>Semester 3</option>
                            <option>Semester 4</option>
                            <option>Semester 5</option>
                            <option>Semester 6</option>
                            <option>Semester 7</option>
                            <option>Semester 8</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <select class="form-select">
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                            <option>Manajemen</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Aktif</option>
                            <option>Tidak Aktif</option>
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
            <form class="modal-content" action="/matakuliah" method="POST">
                @csrf
                @method('post')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah Mata Kuliah</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="kode">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="sks">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="semester">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="programstudi">
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
                        <label for="edit-nama" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-kode" class="form-label">Kode</label>
                        <input class="form-control" id="edit-kode" name="kode"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-sks" class="form-label">SKS</label>
                        <input class="form-control" id="edit-sks" name="sks"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-semester" class="form-label">semester</label>
                        <input class="form-control" id="edit-semester" name="semester"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-programstudi" class="form-label">Program Studi</label>
                        <input class="form-control" id="edit-programstudi" name="programstudi"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus Mata Kuliah ini? **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Mata kuliah Ini</button>
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
                var sks = $(this).data('sks');
                var semester = $(this).data('semester');
                var programstudi = $(this).data('programstudi');
                // var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-kode').val(kode);
                $('#edit-sks').text(sks); // Tampilkan nama role di header modal
                $('#edit-semester').text(semester); // Tampilkan nama role di header modal
                $('#edit-programstudi').text(programstudi); // Tampilkan nama role di header modal
              

                // 3. Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#editRoleForm').attr('action', '/matakuliah/' + id);

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
                $('#deleteRoleForm').attr('action', '/matakuliah/' + id);
            });
        });
    </script>
@endsection
