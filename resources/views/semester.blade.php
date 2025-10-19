@extends('apps.index')
@section('title', 'Semester')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>📘 Data Semester</span>
                <form action="/semester" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama semester"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#addSemesterModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Semester
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Semester</th>
                                <th>Kode</th>
                                <th>Keterangan</th>
                                <th>Tahun Akademik</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ganjil</td>
                                <td>2025G1</td>
                                <td>Semester Ganjil Tahun 2025</td>
                                <td>2025/2026</td>
                                <td><span class="badge bg-info text-dark">Reguler</span></td>
                                <td><span class="badge bg-success">Aktif</span></td>
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
            Data semester digunakan untuk menentukan periode akademik aktif.
        </div>
    </div>
    </div>
    </div>

    <!-- Modal Tambah Semester -->
    <div class="modal fade" id="addSemesterModal" tabindex="-1" aria-labelledby="addSemesterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addSemesterModalLabel">Tambah Semester Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Semester</label>
                        <input type="text" class="form-control" placeholder="Contoh: Ganjil, Genap">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control" placeholder="Contoh: 2025G1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" rows="2" placeholder="Tuliskan deskripsi singkat semester"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Akademik</label>
                        <input type="text" class="form-control" placeholder="Contoh: 2025/2026">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select">
                            <option value="Reguler">Reguler</option>
                            <option value="Pendek">Pendek</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
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
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah Semester Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama prodi</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B"
                            name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="kode">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="keterangan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Akademik</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="tahunakademik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="Type">
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
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Semester: <span id="edit-role-name"></span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id"> {{-- ID role yang akan diupdate --}}

                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Semester</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-kode" class="form-label">Kode</label>
                        <input class="form-control" id="edit-kode" name="kode"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-keterangan" class="form-label">Keterangan</label>
                        <input class="form-control" id="edit-keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-tahunakademik" class="form-label">Tahun Akademik</label>
                        <input class="form-control" id="edit-tahunakademik" name="tahunakademik"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-type" class="form-label">Type</label>
                        <input class="form-control" id="edit-type" name="type"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus Semester ini? **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Semester Ini</button>
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
                var keterangan = $(this).data('keterangan');
                var tahunakademik = $(this).data('tahunakademik');
                var type = $(this).data('type');

                // var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-kode').val(kode);
                $('#edit-keterangan').val(keterangan)); $('#edit-tahunakademik').val(tahunakademik));
            $('#edit-type').val(type);
            $('#edit-role-name').text(nama); // Tampilkan nama role di header modal

            // 3. Atur action form
            // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
            $('#editRoleForm').attr('action', '/semester/' + id);

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
        $('#deleteRoleForm').attr('action', '/semester/' + id);
        });
        });
    </script>

@endsection
