@extends('apps.index')
@section('title', 'Permohonan Pindah Jadwal')

@section('content')
    <div class="col-lg-10 col-md-9 content">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>🔄 Permohonan Pindah Jadwal Mengajar</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jadwal Sebelumnya</th>
                                <th>Jadwal yang Diminta</th>
                                <th>Alasan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pindah_jadwal as $index => $kls)
                                <tr>
                                    <td>{{ $pindah_jadwal->firstItem() + $index }}</td>
                                    </td>
                                    <td>{{ $kls->hari }}
                                        ({{ $kls->shift->jam_mulai }} -
                                        {{ $kls->shift->jam_selesai }})
                                    </td>
                                    <td>{{ $kls->hari }}
                                        ({{ $kls->shift->jam_mulai }} -
                                        {{ $kls->shift->jam_selesai }})</td>
                                    <td>{{ $kls->alasan }}</td>
                                    <td>
                                        @if ($kls->status === 'APPROVED')
                                            <span class="badge bg-success">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @elseif($kls->status === 'REJECTED')
                                            <span class="badge bg-danger">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ ucfirst(strtolower($kls->status)) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Tombol Edit: Memicu modal dan mengirim data role ke fungsi JS/data attributes --}}

                                        @if ($kls->status == 'PENDING')
                                            {{-- Tombol Approve: Memicu modal konfirmasi APPROVE --}}
                                            <button type="button" class="btn btn-outline-success btn-sm btn-action"
                                                data-bs-toggle="modal" data-bs-target="#actionModal"
                                                data-id="{{ $kls->id }}" data-jadwal_id="{{ $kls->jadwal_id }}"
                                                data-ruangan_id="{{ $kls->ruangan_id }}"
                                                data-shift_id="{{ $kls->shift_id }}" data-hari="{{ $kls->hari }}"
                                                data-action="approve" title="Setujui Tugas">
                                                <i class="bi bi-check-circle"></i>
                                            </button>

                                            {{-- Tombol Reject: Memicu modal konfirmasi REJECT --}}
                                            <button type="button" class="btn btn-outline-danger btn-sm btn-action"
                                                data-bs-toggle="modal" data-bs-target="#actionModal"
                                                data-id="{{ $kls->id }}" data-jadwal_id="{{ $kls->jadwal_id }}"
                                                data-ruangan_id="{{ $kls->ruangan_id }}"
                                                data-shift_id="{{ $kls->shift_id }}" data-hari="{{ $kls->hari }}"
                                                data-action="reject" title="Tolak Tugas">
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
            // --- LOGIKA APPROVE/REJECT ---
            const actionButtons = document.querySelectorAll('.btn-action');
            const actionModal = document.getElementById('actionModal');
            const actionForm = document.getElementById('actionForm');
            const actionModalLabel = document.getElementById('actionModalLabel');
            const actionModalHeader = document.getElementById('actionModalHeader');
            const actionVerb = document.getElementById('actionVerb');
            const actionStatusInput = document.getElementById('actionStatusInput');
            const actionConfirmButton = document.getElementById('actionConfirmButton');

            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const suratId = this.getAttribute('data-id');
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

                    // 4. Set Action URL Form (Ganti dengan route yang sudah diperbaiki)
                    actionForm.action = `/pindah_jadwal/${suratId}`;
                });
            });
        });
    </script>
@endsection
