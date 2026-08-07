@extends('layouts.operator')

@section('title', 'Kelola Guru & Staf - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Tenaga Pendidik')

@section('content')

<div class="space-y-8">
    
    <!-- Add Teacher Form -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-user-plus text-amber-500"></i> Tambah Tenaga Pendidik Baru
        </h2>

        <form action="{{ route('operator.teachers.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Nama Lengkap & Gelar</label>
                <input type="text" name="name" required placeholder="Contoh: Budi Santoso, S.Pd." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">NIP (Opsional)</label>
                <input type="text" name="nip" placeholder="1990..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Jabatan / Peran</label>
                <input type="text" name="position" required placeholder="Guru Kelas / PJOK" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">URL Foto (Image Link)</label>
                <input type="text" name="photo" placeholder="https://..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div class="flex items-end">
                <input type="hidden" name="order" value="{{ count($teachers) + 1 }}">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs shadow transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-plus"></i> Tambah Guru
                </button>
            </div>
        </form>
    </div>

    <!-- Teachers Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-base font-bold text-slate-900">Daftar Guru & Staf ({{ count($teachers) }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Foto</th>
                        <th class="px-6 py-3.5">Nama Guru</th>
                        <th class="px-6 py-3.5">NIP</th>
                        <th class="px-6 py-3.5">Jabatan</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($teachers as $teacher)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-3">
                                <img src="{{ $teacher->photo ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop' }}" 
                                     alt="{{ $teacher->name }}" 
                                     class="w-10 h-10 rounded-full object-cover border">
                            </td>
                            <td class="px-6 py-3 font-bold text-slate-900">{{ $teacher->name }}</td>
                            <td class="px-6 py-3 font-mono text-slate-500">{{ $teacher->nip ?? '-' }}</td>
                            <td class="px-6 py-3 font-semibold text-amber-600">{{ $teacher->position }}</td>
                            <td class="px-6 py-3 text-right">
                                <form action="{{ route('operator.teachers.delete', $teacher->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-600 hover:bg-rose-500 hover:text-white font-bold transition">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-400">Belum ada data tenaga pendidik.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
