<x-layouts.mobile title="Profil">
    <div class="bg-gradient-to-br from-indigo-600 to-purple-600 px-5 pt-8 pb-16 rounded-b-[2rem] text-center relative overflow-hidden">
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-white/10 rounded-full"></div>
        <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur mx-auto flex items-center justify-center text-white text-2xl font-bold relative">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <h1 class="text-white font-bold mt-3 relative">{{ $user->name }}</h1>
        <p class="text-indigo-100 text-xs relative">{{ $mahasiswa->nim ?? '-' }}</p>
    </div>

    <div class="px-5 -mt-10 relative space-y-3">
        <div class="bg-white rounded-2xl shadow-lg p-5 space-y-4">
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Program Studi</span>
                <span class="font-medium text-gray-800">{{ $mahasiswa->program_studi ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Fakultas</span>
                <span class="font-medium text-gray-800 text-right w-2/3">{{ $mahasiswa->fakultas ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Angkatan</span>
                <span class="font-medium text-gray-800">{{ $mahasiswa->angkatan ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Semester</span>
                <span class="font-medium text-gray-800">{{ $mahasiswa->semester ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Email</span>
                <span class="font-medium text-gray-800">{{ $user->email }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">No. HP</span>
                <span class="font-medium text-gray-800">{{ $mahasiswa->no_hp ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-sm items-center">
                <span class="text-gray-400">Status</span>
                <span class="px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $mahasiswa->status === 'aktif' ? 'bg-emerald-50 text-emerald-600' : 'bg-gray-100 text-gray-500' }}">
                    {{ ucfirst($mahasiswa->status ?? '-') }}
                </span>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-red-50 text-red-600 font-semibold py-3 rounded-xl text-sm">
                Keluar Akun
            </button>
        </form>
    </div>
</x-layouts.mobile>
