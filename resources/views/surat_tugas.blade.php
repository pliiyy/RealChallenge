@extends('apps.index')
@section('title', 'Surat Tugas')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>📄 Surat Tugas Mengajar</span>
                <button class="btn btn-light btn-sm text-primary fw-semibold" data-bs-toggle="modal"
                    data-bs-target="#addSuratModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Surat Tugas
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dosen</th>
                                <th>Prodi</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Cetak Surat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $index => $kls)
                                <tr>
                                    <td>{{ $surat->firstItem() + $index }}</td>
                                    <td><span>{{ $kls->dosen->user->Biodata->nama }}</span></td>
                                    <td>{{ $kls->matakuliah->Prodi->nama }}</td>
                                    <td>{{ $kls->matakuliah->nama }}</td>
                                    <td>{{ $kls->kelas->nama }}</td>
                                    <td><button href="dokumen_id_1.pdf" target="_blank" class="btn btn-sm btn-info"
                                            title="Lihat PDF" id="btn-tampilkan-pdf" data-surat-id="{{ $kls->id }}">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                        </button></td>
                                    <td>
                                        @if ($kls->status == 'APPROVED')
                                            <span class="badge bg-success">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @elseif($kls->status == 'PENDING')
                                            <span class="badge bg-warning">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Tombol Edit: Memicu modal dan mengirim data role ke fungsi JS/data attributes --}}
                                        @if ($kls->status === 'PENDING')
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-edit"
                                                data-bs-toggle="modal" data-bs-target="#editRoleModal"
                                                data-id="{{ $kls->id }}" data-nama="{{ $kls->nama }}"
                                                data-kode="{{ $kls->kode }}"data-jam_mulai="{{ $kls->jam_mulai }}"
                                                data-jam_selesai="{{ $kls->jam_selesai }}"> <i class="bi bi-pencil"></i>
                                            </button>
                                        @endif

                                        {{-- Tombol Delete: Memicu modal konfirmasi hapus --}}
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                            data-bs-toggle="modal" data-bs-target="#deleteRoleModal"
                                            data-id="{{ $kls->id }}" data-nama="{{ $kls->nama }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        @if ($kls->status == 'PENDING')
                                            {{-- Tombol Approve: Memicu modal konfirmasi APPROVE --}}
                                            <button type="button" class="btn btn-outline-success btn-sm btn-action"
                                                data-bs-toggle="modal" data-bs-target="#actionModal"
                                                data-id="{{ $kls->id }}" data-kelas-id="{{ $kls->kelas_id }}"
                                                data-dosen-id="{{ $kls->dosen_id }}"
                                                data-matakuliah-id="{{ $kls->matakuliah_id }}" data-action="approve"
                                                title="Setujui Tugas">
                                                <i class="bi bi-check-circle"></i>
                                            </button>

                                            {{-- Tombol Reject: Memicu modal konfirmasi REJECT --}}
                                            <button type="button" class="btn btn-outline-danger btn-sm btn-action"
                                                data-bs-toggle="modal" data-bs-target="#actionModal"
                                                data-id="{{ $kls->id }}" data-kelas-id="{{ $kls->kelas_id }}"
                                                data-dosen-id="{{ $kls->dosen_id }}"
                                                data-matakuliah-id="{{ $kls->matakuliah_id }}" data-action="reject"
                                                title="Tolak Tugas">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        @else
                                            {{-- Jika status sudah APPROVED/REJECTED, tampilkan tombol edit/delete lama (Opsional) --}}
                                            <button type="button" class="btn btn-outline-secondary btn-sm" disabled>
                                                <i class="bi bi-slash-circle" title="Sudah Diproses"></i>
                                            </button>
                                        @endif
                                    </td>
                                    {{-- ... akhir loop ... --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3">
            {{ $surat->links() }}
        </div>
        <div class="mt-4 alert alert-info bg-opacity-25 border-0 text-primary">
            <i class="bi bi-info-circle me-2"></i>
            Daftar surat tugas mengajar yang telah diterbitkan untuk setiap dosen.
        </div>
    </div>
    </div>
    </div>

    <!-- Modal Tambah Surat -->
    <div class="modal fade" id="addSuratModal" tabindex="-1" aria-labelledby="addSuratModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addSuratModalLabel">Tambah Surat Tugas Mengajar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Dosen</label>
                        <select class="form-select" name="dosen_id">
                            @foreach ($dosen as $item)
                                <option value="{{ $item->id }}">{{ $item->user->Biodata->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-select" name="matakuliah_id">
                            @foreach ($matakuliah as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kelas</label>
                        <select class="form-select" name="kelas_id">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
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
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Preview PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfIframe" style="width: 100%; height: 600px;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{-- Form akan diisi action URL-nya oleh JavaScript --}}
            <form class="modal-content" method="POST" id="actionForm">
                @csrf
                {{-- Kita akan menggunakan method PUT/PATCH untuk update status --}}
                @method('PUT')
                <div class="modal-header text-white" id="actionModalHeader">
                    <h5 class="modal-title" id="actionModalLabel">Konfirmasi Aksi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin <strong id="actionVerb">memproses</strong> surat tugas ini?

                    {{-- Input tersembunyi untuk menyimpan status baru --}}
                    <input type="hidden" name="status" id="actionStatusInput">
                    <input type="hidden" name="kelas_id" id="valueKelasId">
                    <input type="hidden" name="dosen_id" id="valueDosenId">
                    <input type="hidden" name="matakuliah_id" id="valueMatakuliahId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn" id="actionConfirmButton">Ya, Proses</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnTampilkanPdf = document.getElementById('btn-tampilkan-pdf');
            const pdfIframe = document.getElementById('pdfIframe');
            const pdfModal = new bootstrap.Modal(document.getElementById('pdfModal')); // Inisialisasi modal

            btnTampilkanPdf.addEventListener('click', function() {
                // Atur src iframe ke route yang menghasilkan PDF
                const suratId = this.getAttribute('data-surat-id');
                const pdfUrl = "{{ route('laporan.pdf.show') }}" +
                    "?id=" + suratId +
                    "&t=" + new Date().getTime();

                // Penting: Tambahkan timestamp unik untuk menghindari caching
                pdfIframe.src = pdfUrl + '?t=' + new Date().getTime();

                // Tampilkan modal
                pdfModal.show();
            });

            // Opsional: Kosongkan src saat modal ditutup untuk menghemat sumber daya
            document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function() {
                pdfIframe.src = '';
            });

            // --- LOGIKA APPROVE/REJECT ---
            const actionButtons = document.querySelectorAll('.btn-action');
            const actionModal = document.getElementById('actionModal');
            const actionForm = document.getElementById('actionForm');
            const actionModalLabel = document.getElementById('actionModalLabel');
            const actionModalHeader = document.getElementById('actionModalHeader');
            const actionVerb = document.getElementById('actionVerb');
            const actionStatusInput = document.getElementById('actionStatusInput');
            const dosen = document.getElementById('valueDosenId');
            const kelas = document.getElementById('valueKelasId');
            const matkul = document.getElementById('valueMatakuliahId');
            const actionConfirmButton = document.getElementById('actionConfirmButton');

            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const suratId = this.getAttribute('data-id');
                    const kelasId = this.getAttribute('data-kelas-id');
                    const dosenId = this.getAttribute('data-dosen-id');
                    const matakuliahId = this.getAttribute(
                        'data-matakuliah-id'); // Pastikan ini sesuai dengan data attribute di HTML
                    const action = this.getAttribute('data-action');

                    let verb = '';
                    let statusValue = '';
                    let headerClass = '';
                    let buttonText = '';

                    if (action === 'approve') {
                        verb = 'menyetujui';
                        statusValue = 'APPROVED';
                        headerClass = 'bg-success';
                        buttonText = 'Ya, Setujui';
                    } else if (action === 'reject') {
                        verb = 'menolak';
                        statusValue = 'REJECTED';
                        headerClass = 'bg-danger';
                        buttonText = 'Ya, Tolak';
                    }

                    // 1. Update Konten Modal
                    actionModalLabel.textContent = `Konfirmasi ${verb.toUpperCase()}`;
                    actionVerb.textContent = verb;

                    // 2. Update Style Modal
                    actionModalHeader.className = `modal-header text-white ${headerClass}`;
                    actionConfirmButton.className = `btn ${headerClass}`;
                    actionConfirmButton.textContent = buttonText;

                    // 3. Set nilai input tersembunyi
                    actionStatusInput.value = statusValue;

                    // Perbaikan: gunakan ID yang baru diambil
                    kelas.value = kelasId;
                    dosen.value = dosenId;
                    matkul.value =
                        matakuliahId; // Pastikan variabel 'matkul' merujuk ke input yang benar

                    // 4. Set Action URL Form (Ganti dengan route yang sudah diperbaiki)
                    actionForm.action = `/surat_tugas/${suratId}`;
                });
            });
        });
    </script>
@endsection
