@extends('apps.index')
@section('title', 'Jadwal')

@section('content')
            <div class="col-lg-10 col-md-9 content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>🕒 Data Jadwal Perkuliahan</span>
                        <form action="/jadwal" method="GET" class="mb-3 d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama jadwal"
                        value="{{ request('search') }}">

                    <select name="status" class="form-select">
                        <option value="">-- Semua Status --</option>
                        <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                        <option value="NONAKTIF" {{ request('status') == 'NONAKTIF' ? 'selected' : '' }}>Nonaktif</option>
                    </select>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                        <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal" data-bs-target="#addJadwalModal">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mata Kuliah</th>
                                        <th>Dosen</th>
                                        <th>Ruangan</th>
                                        <th>Kelas</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Semester</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Pemrograman Web</td>
                                        <td>Dr. Andi Rahman</td>
                                        <td>Lab 3</td>
                                        <td>TI-5A</td>
                                        <td>Senin</td>
                                        <td>08:00 - 10:00</td>
                                        <td>Ganjil 2025</td>
                                        <td>2025/2026</td>
                                        <td><span class="badge bg-success">Aktif</span></td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Struktur Data</td>
                                        <td>Dr. Siti Marlina</td>
                                        <td>Ruang B-202</td>
                                        <td>SI-3B</td>
                                        <td>Rabu</td>
                                        <td>10:00 - 12:00</td>
                                        <td>Genap 2024</td>
                                        <td>2024/2025</td>
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
                    Kelola jadwal perkuliahan dengan memastikan tidak ada bentrok antar waktu dan ruangan.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="addJadwalModal" tabindex="-1" aria-labelledby="addJadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addJadwalModalLabel">Tambah Jadwal Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select">
                            <option>Pemrograman Web</option>
                            <option>Struktur Data</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dosen</label>
                        <select class="form-select">
                            <option>Dr. Andi Rahman</option>
                            <option>Dr. Siti Marlina</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ruangan</label>
                        <input type="text" class="form-control" placeholder="Contoh: Lab 3">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" placeholder="Contoh: TI-5A">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Hari</label>
                        <select class="form-select">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam</label>
                        <input type="text" class="form-control" placeholder="08:00 - 10:00">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Semester</label>
                        <select class="form-select">
                            <option>Ganjil 2025</option>
                            <option>Genap 2024</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" placeholder="2025/2026">
                    </div>
                    <div class="col-md-12">
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
            <form class="modal-content" action="/jadwal" method="POST">
                @csrf
                @method('post')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addKelasModalLabel">Tambah Jadwal</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" placeholder="Contoh: Kelas A, Kelas B" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosen</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="dosen">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="ruangan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="kelas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="hari">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="jam">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="semester">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="number" class="form-control" placeholder="Contoh: 40" name="tahunajaran">
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
                        <label for="edit-nama" class="form-label">Nama jadwal</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit-dosen" class="form-label">Dosen</label>
                        <input class="form-control" id="edit-dosen" name="dosen"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-ruangan" class="form-label">Ruangan</label>
                        <input class="form-control" id="edit-ruangan" name="ruangan"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-kelas" class="form-label">Kelas</label>
                        <input class="form-control" id="edit-kelas" name="kelas"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-hari" class="form-label">hari</label>
                        <input class="form-control" id="edit-hari" name="hari"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-jam" class="form-label">Jam</label>
                        <input class="form-control" id="edit-jam" name="jam"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-semester" class="form-label">Semester</label>
                        <input class="form-control" id="edit-semester" name="semester"></textarea>
                    </div>
                     <div class="mb-3">
                        <label for="edit-tahunajaran" class="form-label">Tahun Ajaran</label>
                        <input class="form-control" id="edit-tahunajaran" name="tahunajaran"></textarea>
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
                    <p>Apakah Anda yakin ingin menghapus Jadwal ini? **<span id="delete-role-name"></span>**?</p>
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus Jadwal Ini</button>
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
                var dosen = $(this).data('dosen');
                var ruangan = $(this).data('ruangan');
                var kelas = $(this).data('kelas');
                var hari = $(this).data('hari');
                var jam = $(this).data('jam');
                var semester = $(this).data('semester');
                var tahunajaran = $(this).data('tahunajaran');
                // var izinAksesJson = $(this).data('izin_akses');

                // 2. Isi data Role ke dalam form modal
                $('#edit-id').val(id);
                $('#edit-nama').val(nama);
                $('#edit-dosen').val(dosen);
                $('#edit-ruangan').text(ruangan); // Tampilkan nama role di header modal
                $('#edit-kelas').text(kelas); // Tampilkan nama role di header modal
                $('#edit-hari').text(hari); // Tampilkan nama role di header modal
                $('#edit-jam').text(jam); // Tampilkan nama role di header modal
                $('#edit-semester').text(semester); // Tampilkan nama role di header modal
                $('#edit-tahunajaran').text(tahunajaran); // Tampilkan nama role di header modal

                // 3. Atur action form
                // Ganti '/role/' dengan URL route Anda yang benar, misal '/roles' atau sejenisnya
                $('#editRoleForm').attr('action', '/jadwal/' + id);

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
                $('#deleteRoleForm').attr('action', '/jadwal/' + id);
            });
        });
    </script>
@endsection

