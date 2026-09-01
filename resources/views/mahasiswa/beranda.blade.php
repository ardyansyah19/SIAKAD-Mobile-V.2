<x-layouts.mobile title="Beranda">
    <!-- Header -->
    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 px-5 pt-8 pb-16 rounded-b-[2rem] relative overflow-hidden">
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="absolute top-16 -left-10 w-24 h-24 bg-white/10 rounded-full"></div>

        <div class="flex items-center justify-between relative">
            <div>
                <p class="text-indigo-100 text-sm">Selamat datang,</p>
                <h1 class="text-white text-lg font-bold">{{ $user->name }}</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="mt-4 flex items-center gap-2 text-indigo-100 text-xs">
            <span class="bg-white/20 px-2.5 py-1 rounded-full">{{ $mahasiswa->nim ?? '-' }}</span>
            <span class="bg-white/20 px-2.5 py-1 rounded-full">{{ $mahasiswa->program_studi ?? '-' }}</span>
        </div>
    </div>

    <!-- Kartu Ringkasan Akademik -->
    <div class="px-5 -mt-10 relative">
        <div class="bg-white rounded-2xl shadow-lg p-5 grid grid-cols-3 gap-3 text-center">
            <div>
                <p class="text-xl font-bold text-indigo-600">{{ number_format($ringkasan['ipk'], 2) }}</p>
                <p class="text-[11px] text-gray-400 mt-0.5">IPK</p>
            </div>
            <div class="border-x border-gray-100">
                <p class="text-xl font-bold text-indigo-600">{{ $ringkasan['sks_tempuh'] }}/{{ $ringkasan['sks_total'] }}</p>
                <p class="text-[11px] text-gray-400 mt-0.5">SKS Tempuh</p>
            </div>
            <div>
                <p class="text-xl font-bold text-indigo-600">{{ $ringkasan['semester_berjalan'] }}</p>
                <p class="text-[11px] text-gray-400 mt-0.5">Semester</p>
            </div>
        </div>
    </div>

    <!-- Menu Cepat -->
    <div class="px-5 mt-6">
        <h2 class="text-sm font-semibold text-gray-700 mb-3">Menu Cepat</h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach ([
                ['label' => 'KRS', 'color' => 'bg-indigo-50 text-indigo-600', 'icon' => 'M9 17v-2a4 4 0 014-4h4m0 0l-3-3m3 3l-3 3M4 7h16M4 7a2 2 0 002 2h12a2 2 0 002-2M4 7a2 2 0 012-2h12a2 2 0 012 2'],
                ['label' => 'KHS', 'color' => 'bg-purple-50 text-purple-600', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['label' => 'Jadwal', 'color' => 'bg-amber-50 text-amber-600', 'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['label' => 'UKT', 'color' => 'bg-emerald-50 text-emerald-600', 'icon' => 'M17 9V7a4 4 0 00-8 0v2M5 9h14l1 12H4L5 9z'],
            ] as $menu)
                <a href="#" class="flex flex-col items-center gap-2">
                    <div class="w-12 h-12 rounded-xl {{ $menu['color'] }} flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu['icon'] }}" />
                        </svg>
                    </div>
                    <span class="text-[11px] text-gray-600 font-medium">{{ $menu['label'] }}</span>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="px-5 mt-6">
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-sm font-semibold text-gray-700">Jadwal Hari Ini</h2>
            <a href="#" class="text-xs text-indigo-600 font-medium">Lihat semua</a>
        </div>
        <div class="space-y-3">
            @forelse ($jadwalHariIni as $jadwal)
                <div class="bg-white rounded-2xl shadow-sm p-4 flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-indigo-600 flex items-center justify-center text-white shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $jadwal['mk'] }}</p>
                        <p class="text-xs text-gray-400">{{ $jadwal['jam'] }} · {{ $jadwal['ruang'] }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400 text-center py-4">Tidak ada jadwal hari ini.</p>
            @endforelse
        </div>
    </div>

    <!-- Pengumuman -->
    <div class="px-5 mt-6">
        <h2 class="text-sm font-semibold text-gray-700 mb-3">Pengumuman</h2>
        <div class="space-y-3">
            @foreach ($pengumuman as $info)
                <div class="bg-white rounded-2xl shadow-sm p-4 flex items-start gap-3">
                    <div class="w-2 h-2 rounded-full bg-amber-400 mt-1.5 shrink-0"></div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-gray-800">{{ $info['judul'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $info['tanggal'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layouts.mobile>
