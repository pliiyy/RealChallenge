<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow p-6" x-data="{ tab: 'R1' }">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">JADWAL MATA KULIAH PROGRAM S1 SI & BD, D3 KA</h1>
            <h2 class="text-lg font-semibold text-gray-700">SEMESTER GANJIL 2025/2026</h2>
        </div>

        <!-- Tabs -->
        <div class="flex justify-center gap-4 mb-6 flex-wrap">
            @foreach(['R1','R3','R5','R7','NR1','NR3','NR5','NR7','RUANG'] as $t)
                <button 
                    @click="tab = '{{ $t }}'" 
                    class="px-4 py-2 rounded-lg text-sm font-semibold transition duration-200"
                    :class="tab === '{{ $t }}' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                    {{ $t }}
                </button>
            @endforeach
        </div>

        <!-- Jadwal Container -->
        <div class="overflow-x-auto overflow-y-auto max-h-[75vh] border rounded-lg">
            
            <!-- Jadwal R1 -->
            <div x-show="tab === 'R1'" class="min-w-[900px]">
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                    <div class="mb-8 border border-gray-300 rounded-lg">
                        <div class="bg-yellow-300 font-bold text-lg px-4 py-2">{{ strtoupper($hari) }}</div>
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-sm text-left">
                                    <th class="border px-3 py-2 w-32">WAKTU</th>
                                    <th class="border px-3 py-2 text-center">S1 SI</th>
                                    <th class="border px-3 py-2 text-center">D3 KA</th>
                                    <th class="border px-3 py-2 text-center">S1 BD A</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contoh Data Dummy -->
                                <tr>
                                    <td class="border px-3 py-2">07.30 - 09.10</td>
                                    <td class="border px-3 py-2 text-center">
                                        Pendidikan Agama Islam I<br>
                                        <span class="text-sm text-gray-600">Dr. Yudhy</span><br>
                                        <span class="text-xs">A204</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Pengantar Akuntansi<br>
                                        <span class="text-sm text-gray-600">Dr. Latifah</span><br>
                                        <span class="text-xs">A211</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Pengantar Manajemen<br>
                                        <span class="text-sm text-gray-600">Armansyah</span><br>
                                        <span class="text-xs">A205</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border px-3 py-2">09.20 - 11.00</td>
                                    <td class="border px-3 py-2 text-center">
                                        Pengantar Manajemen<br>
                                        <span class="text-sm text-gray-600">Yelly A.M.</span><br>
                                        <span class="text-xs">Lab Jaringan</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Pengantar Manajemen & Bisnis<br>
                                        <span class="text-sm text-gray-600">Dadang Dimyati</span><br>
                                        <span class="text-xs">A211</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Pengantar Akuntansi<br>
                                        <span class="text-sm text-gray-600">Dr. Latifah</span><br>
                                        <span class="text-xs">A205</span>
                                    </td>
                                </tr>

                                <!-- Baris Shalat -->
                                <tr class="bg-green-200 font-semibold text-center">
                                    <td colspan="4" class="py-2">12.00 - 12.30 → Shalat Dzuhur</td>
                                </tr>

                                <tr>
                                    <td class="border px-3 py-2">13.00 - 15.30</td>
                                    <td class="border px-3 py-2 text-center">
                                        Analisis Sistem Informasi<br>
                                        <span class="text-sm text-gray-600">Dr. Latifah</span><br>
                                        <span class="text-xs">A205</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Praktikum Komputer<br>
                                        <span class="text-sm text-gray-600">Kanda Ishak</span><br>
                                        <span class="text-xs">B302</span>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        Sistem Basis Data<br>
                                        <span class="text-sm text-gray-600">Dr. Rudianto</span><br>
                                        <span class="text-xs">A211</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border px-3 py-2">15.40 - 17.00</td>
                                    <td class="border px-3 py-2 text-center">—</td>
                                    <td class="border px-3 py-2 text-center">—</td>
                                    <td class="border px-3 py-2 text-center">—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>

            <!-- Jadwal Tab Lain (Dummy Sama) -->
            @foreach(['R3','R5','R7','NR1','NR3','NR5','NR7','RUANG'] as $tab)
                <div x-show="tab === '{{ $tab }}'" class="min-w-[900px] text-center text-gray-500 py-20">
                    Jadwal {{ $tab }} (masih dummy, bisa disalin dari R1)
                </div>
            @endforeach

        </div>
    </div>

</body>
</html>
