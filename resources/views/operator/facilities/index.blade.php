@extends('layouts.operator')

@section('title', 'Kelola Fasilitas - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Fasilitas Sekolah')

@section('content')

<div class="space-y-8">
    
    <!-- Add Facility Form -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-plus-circle text-emerald-500"></i> Tambah Fasilitas Baru
        </h2>

        <form action="{{ route('operator.facilities.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Nama Fasilitas</label>
                <input type="text" name="name" required placeholder="Contoh: Perpustakaan Digital" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">URL Gambar (Image Link)</label>
                <input type="text" name="image" placeholder="https://..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Singkat</label>
                <input type="text" name="description" placeholder="Fasilitas pendukung..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white font-bold text-xs shadow transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-plus"></i> Simpan Fasilitas
                </button>
            </div>
        </form>
    </div>

    <!-- Facilities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($facilities as $fac)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between p-4 space-y-3">
                <img src="{{ $fac->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400&auto=format&fit=crop' }}" alt="{{ $fac->name }}" class="w-full h-40 object-cover rounded-xl border">
                <div>
                    <h4 class="font-bold text-slate-900 text-sm">{{ $fac->name }}</h4>
                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $fac->description }}</p>
                </div>
                <div class="pt-2 border-t border-slate-100 flex justify-end">
                    <form action="{{ route('operator.facilities.delete', $fac->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/10 text-rose-600 hover:bg-rose-500 hover:text-white text-xs font-bold transition">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
