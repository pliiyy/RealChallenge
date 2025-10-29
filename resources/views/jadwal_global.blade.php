@extends('apps.index')
@section('title', 'Jadwal')

@section('content')
    {{-- @dd($fakultas) --}}
    <div class="col-md-9 col-lg-10 content">
        <h3 class="text-center mb-2 fw-bold">UNIVERSITAS MA'SOEM FAKULTAS
            {{ $fakultas->nama ? strtoupper($fakultas->nama) : '' }}</h3>
        <h3 class="text-center mb-2 fw-bold">JADWAL MATA KULIAH
            {{ collect($grouped)->flatMap(fn($kelasGroup) => collect($kelasGroup)->keys())->unique()->implode(', ') }}
        </h3>
        <h5 class="text-center text-secondary mb-4">SEMESTER {{ $sems?->tipe }}
            {{ $sems?->tahun_akademik }}
        </h5>

        {{-- Tabs --}}
        <div class="d-flex justify-content-center mb-3">
            @foreach ($availableTabs as $tab)
                <a href="{{ route('jadwal_global', ['tab' => $tab]) }}"
                    class="btn btn-sm me-2 {{ $tab === $activeTab ? 'btn-primary' : 'btn-outline-secondary' }}">
                    {{ $tab }}
                </a>
            @endforeach
            {{-- <a href="{{ route('jadwal_global', ['tab' => 'RUANG']) }}"
                class="btn btn-sm {{ $activeTab === 'RUANG' ? 'btn-primary' : 'btn-outline-secondary' }}">
                RUANG
            </a> --}}
            <a href="{{ route('jadwal_export_ruang', ['tab' => $activeTab]) }}" target="_blank" class="btn btn-sm btn-success">
                <i class="bi bi-file-pdf"></i> DOWNLOAD PDF ({{ $activeTab }})
            </a>
        </div>

        {{-- Tabel Jadwal --}}
        @if ($grouped->isEmpty())
            <div class="alert alert-warning text-center">Tidak ada data untuk tab {{ $activeTab }}.</div>
        @else
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    Semester {{ $activeTab }}
                </div>
                <div class="card-body">
                    @foreach ($grouped as $hari => $kelasGroup)
                        <div class="mb-4">
                            <div class="bg-warning text-dark fw-bold p-2 mb-2">{{ $hari }}</div>

                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>WAKTU</th>
                                        @foreach ($kelasGroup as $kelasNama => $jadwalPerKelas)
                                            <th class="text-center">{{ $kelasNama }}</th>
                                            @if (auth()->user()->dosen)
                                                <th class="text-center">AKSI</th>
                                            @endif
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shifts as $shift)
                                        @php
                                            $waktu = $shift->jam_mulai . ' - ' . $shift->jam_selesai;
                                        @endphp
                                        <tr>
                                            <td class="fw-bold">{{ $waktu }}</td>
                                            @foreach ($kelasGroup as $kelasNama => $jadwalPerKelas)
                                                @php
                                                    $data = $jadwalPerKelas->firstWhere('shift.id', $shift->id);
                                                @endphp
                                                <td>
                                                    @if ($data)
                                                        <div>{{ $data->suratTugasMengajar->mataKuliah->nama ?? '-' }}</div>
                                                        <small class="text-muted">
                                                            {{ $data->suratTugasMengajar->dosen->user->biodata->nama ?? '-' }}<br />
                                                            {{ $data->ruangan->kode ?? '-' }}
                                                            ({{ $data->ruangan->nama ?? '-' }})
                                                        </small>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                @if (auth()->user()->dosen)
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        @if ($data)
                                                            @if ($data->suratTugasMengajar->dosen->user->id === auth()->user()->id)
                                                                <button type="button"
                                                                    class="btn btn-outline-danger btn-sm btn-pindah"
                                                                    data-id="{{ $data->id }}"
                                                                    data-hari="{{ $hari }}"
                                                                    data-shift_id="{{ $shift->id }}"
                                                                    data-surat_tugas_mengajar_id="{{ $data->suratTugasMengajar->id ?? '-' }}"
                                                                    data-ruangan_id="{{ $data->ruangan->id ?? '' }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#pindahJadwalModal">
                                                                    Pindah
                                                                </button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-outline-success btn-sm btn-barter"
                                                                    data-bs-toggle="modal" data-bs-target="#addBarterModal"
                                                                    data-jadwal_tukar_id="{{ $data->id }}">
                                                                    Barter
                                                                </button>
                                                            @endif
                                                        @else
                                                            <span class="text-muted">
                                                                <button type="button"
                                                                    class="btn btn-outline-success btn-sm btn-charter"
                                                                    data-hari="{{ $hari }}"
                                                                    data-shift-id="{{ $shift->id }}"
                                                                    data-bs-toggle="modal" data-bs-target="#addJadwalModal">
                                                                    Charter
                                                                </button>
                                                            </span>
                                                        @endif
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="addJadwalModal" tabindex="-1" aria-labelledby="addJadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" action="/jadwal">
                @csrf
                @method('POST')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addJadwalModalLabel">Charter Jadwal</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="surat_tugas_mengajar_id" id="matkulSelect">
                            @foreach ($surat as $item)
                                <option value="{{ $item->id }}"
                                    data-dosen="{{ $item->dosen->user->biodata->keterangan }}">
                                    {{ $item->matakuliah->nama }}
                                    ({{ $item->kelas->nama }})
                                    {{ $item->dosen->User->biodata->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ruangan</label>
                        <select class="form-select" name="ruangan_id">
                            @foreach ($ruangan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->kode }})</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Preferensi Dosen akan muncul di sini -->
                    <div class="col-md-12 text-xs mt-2" id="preferensiDosen" style="display:none;">
                        <div class="text-danger" id="preferensiText" style="font-size: 0.85rem;">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Hari</label>
                        <select class="form-select" name="hari">
                            <option value="SENIN">Senin</option>
                            <option value="SELASA">Selasa</option>
                            <option value="RABU">Rabu</option>
                            <option value="KAMIS">Kamis</option>
                            <option value="JUMAT">Jumat</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam</label>
                        <select class="form-select" name="shift_id">
                            @foreach ($shifts as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->jam_mulai }} -
                                    {{ $item->jam_selesai }})</option>
                            @endforeach
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

    <div class="modal fade" id="pindahJadwalModal" tabindex="-1" aria-labelledby="pindahJadwalModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" action="/pindah_jadwal">
                @csrf
                @method('POST')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addJadwalModalLabel">Pindahkan Jadwal</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <input type="hidden" name="id" id="edit-id">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="surat_tugas_mengajar_id" id="edit-surat_tugas_mengajar_id"
                            disabled>
                            @foreach ($surat as $item)
                                <option value="{{ $item->id }}">{{ $item->matakuliah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ruangan</label>
                        <select class="form-select" name="ruangan_id" id="edit-ruangan_id">
                            @foreach ($ruangan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->kode }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Hari</label>
                        <select class="form-select" name="hari" id="edit-hari">
                            <option value="SENIN">Senin</option>
                            <option value="SELASA">Selasa</option>
                            <option value="RABU">Rabu</option>
                            <option value="KAMIS">Kamis</option>
                            <option value="JUMAT">Jumat</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jam</label>
                        <select class="form-select" name="shift_id" id="edit-shift_id">
                            @foreach ($shifts as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} ({{ $item->jam_mulai }} -
                                    {{ $item->jam_selesai }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alasan</label>
                        <textarea class="form-control" rows="3" placeholder="Alasan Pindah Jadwal" name="alasan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="addBarterModal" tabindex="-1" aria-labelledby="addBarterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST" action="/barter_jadwal">
                @csrf
                @method('POST')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addBarterModalLabel">Ajukan Barter Jadwal</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Dari Jadwal</label>
                        <select class="form-select" name="jadwal_awal_id" id="edit-jadwal_awal_id">
                            @foreach ($jadwalMe as $item)
                                <option value="{{ $item->id }}">{{ $item->suratTugasMengajar->Matakuliah->nama }}
                                    ({{ $item->hari }} {{ $item->shift->nama }} {{ $item->shift->jam_mulai }} -
                                    {{ $item->shift->jam_selesai }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Ke Jadwal</label>
                        <select class="form-select" name="jadwal_tukar_id" id="edit-jadwal_tukar_id">
                            @foreach ($jadwal as $item)
                                <option value="{{ $item->id }}">{{ $item->suratTugasMengajar->Matakuliah->nama }}
                                    ({{ $item->hari }} {{ $item->shift->nama }} {{ $item->shift->jam_mulai }} -
                                    {{ $item->shift->jam_selesai }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" rows="3" placeholder="Alasan barter" name="alasan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Saat tombol "Charter" diklik
            document.querySelectorAll('.btn-charter').forEach(btn => {
                btn.addEventListener('click', function() {
                    const hari = this.getAttribute('data-hari');
                    const shiftId = this.getAttribute('data-shift-id');

                    // Isi field "Hari"
                    const hariSelect = document.querySelector(
                        '#addJadwalModal select[name="hari"]');
                    if (hariSelect) {
                        hariSelect.value = hari;
                    }

                    // Isi field "Shift"
                    const shiftSelect = document.querySelector(
                        '#addJadwalModal select[name="shift_id"]');
                    if (shiftSelect) {
                        shiftSelect.value = shiftId;
                    }
                });
            });
            document.querySelectorAll('.btn-pindah').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const matkul = this.getAttribute('data-surat_tugas_mengajar_id');
                    const ruanganId = this.getAttribute('data-ruangan_id');

                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-surat_tugas_mengajar_id').value = matkul;
                    document.getElementById('edit-ruangan_id').value = ruanganId;

                    // Isi nama ruangan (dari dropdown)
                    // const ruanganText = this.closest('td').querySelector('small')?.textContent
                    //     ?.trim() ?? '-';
                    // document.getElementById('pindahRuangan').value = ruanganText;
                });
            });
            document.querySelectorAll('.btn-barter').forEach(btn => {
                btn.addEventListener('click', function() {
                    // const jadwal_awal_id = this.getAttribute('data-jadwal_awal_id');
                    const jadwal_tukar_id = this.getAttribute('data-jadwal_tukar_id');

                    // document.getElementById('edit-jadwal_awal_id').value = jadwal_awal_id;
                    document.getElementById('edit-jadwal_tukar_id').value = jadwal_tukar_id;

                });
            });
            const matkulSelect = document.getElementById('matkulSelect');
            if (matkulSelect) {
                matkulSelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const preferensiDosen = selectedOption.getAttribute('data-dosen');

                    const preferensiDiv = document.getElementById('preferensiDosen');
                    const preferensiText = document.getElementById('preferensiText');

                    if (preferensiDosen && preferensiDosen.trim() !== '') {
                        preferensiText.textContent = 'Preferensi Dosen: ' + preferensiDosen;
                        preferensiDiv.style.display = 'block';
                    } else {
                        preferensiDiv.style.display = 'none';
                    }
                });
            }
        });
    </script>
@endsection
