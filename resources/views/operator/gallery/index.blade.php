@extends('layouts.operator')

@section('title', 'Kelola Galeri Foto - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Dokumentasi Galeri')

@section('content')

<div class="space-y-8">
    
    <!-- Add Gallery Form -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-image text-purple-600"></i> Tambah Foto Galeri Baru
        </h2>

        <form action="{{ route('operator.gallery.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Judul / Keterangan Foto</label>
                <input type="text" name="title" required placeholder="Contoh: Upacara Bendera" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Kategori Foto</label>
                <input type="text" name="category" required placeholder="Kegiatan / Olahraga / Seni" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">URL Foto (Image Link)</label>
                <input type="text" name="image" required placeholder="https://..." class="w-full px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs">
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs shadow transition flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-plus"></i> Unggah Foto
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($galleries as $gal)
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden p-3 space-y-2">
                <div class="h-44 rounded-xl overflow-hidden bg-slate-900 border">
                    <img src="{{ $gal->image }}" alt="{{ $gal->title }}" class="w-full h-full object-cover">
                </div>
                <div class="flex items-center justify-between pt-1">
                    <div>
                        <span class="text-[10px] font-bold text-purple-600 uppercase">{{ $gal->category }}</span>
                        <h4 class="font-bold text-slate-900 text-xs">{{ $gal->title }}</h4>
                    </div>
                    <form action="{{ route('operator.gallery.delete', $gal->id) }}" method="POST" onsubmit="return confirm('Hapus foto galeri ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-lg bg-rose-500/10 text-rose-600 hover:bg-rose-500 hover:text-white transition">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
