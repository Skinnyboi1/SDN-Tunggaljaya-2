@extends('layouts.operator')

@section('title', 'Dashboard Operator - SDN Tunggaljaya 2')
@section('header_title', 'Ringkasan Dashboard Operator')

@section('content')

<!-- 0. STATIC SITE EXPORTER & PUBLISH BANNER -->
<div class="bg-gradient-to-r from-[#2a170f] via-[#3b2116] to-[#6d4330] p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-2xl mb-6 sm:mb-8 text-white">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
        <div class="space-y-2 max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-lg bg-emerald-600/30 text-emerald-200 border border-emerald-500/40 text-[11px] font-bold uppercase tracking-wider">
                <i class="fa-solid fa-bolt text-emerald-400"></i> Mode Website Statis Aktif (Opsi 1)
            </div>
            <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">
                Publikasi & Ekspor File Website Statis
            </h2>
            <p class="text-xs text-[#f5e5da] leading-relaxed">
                Ubah seluruh data sekolah, foto guru, fasilitas, dan berita menjadi file HTML murni siap pakai di folder <code class="px-1.5 py-0.5 rounded bg-black/40 text-primary font-mono text-[11px]">docs/</code> (langsung cocok dengan pilihan <strong>/docs</strong> di GitHub Pages) dan folder <code class="px-1.5 py-0.5 rounded bg-black/40 text-primary font-mono text-[11px]">dist/</code>.
            </p>
            
            <div class="flex flex-wrap items-center gap-4 text-[11px] text-primary pt-1 font-medium">
                <span><i class="fa-regular fa-clock mr-1"></i> Terakhir Diekspor: <strong class="text-white">{{ $exportMeta['exported_at'] ?? 'Belum pernah diekspor' }}</strong></span>
                @if(isset($exportMeta['pages_count']))
                    <span>&bull;</span>
                    <span><i class="fa-solid fa-file-code mr-1"></i> Total Halaman: <strong class="text-white">{{ $exportMeta['pages_count'] }} Halaman</strong></span>
                @endif
            </div>
        </div>

        <div class="flex flex-col sm:flex-row lg:flex-col shrink-0 gap-2.5">
            <form action="{{ route('operator.exportStatic', [], false) }}" method="POST">
                @csrf
                <button type="submit" class="w-full px-5 py-3 rounded-xl bg-primary hover:bg-primary-200 text-slate-950 font-extrabold text-xs sm:text-sm shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer active:scale-95">
                    <i class="fa-solid fa-rocket text-secondary"></i> 🚀 Ekspor Website Statis Sekarang
                </button>
            </form>

            <a href="{{ route('operator.downloadStaticZip', [], false) }}" class="w-full px-5 py-2.5 rounded-xl bg-[#9e6f54] hover:bg-[#835841] text-white font-bold text-xs shadow transition flex items-center justify-center gap-2 border border-[#835841]">
                <i class="fa-solid fa-file-zipper text-primary"></i> 📦 Unduh File Statis (.ZIP)
            </a>
        </div>
    </div>
</div>

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">
    
    <div class="bg-secondary p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-[10px] sm:text-xs text-primary font-bold uppercase tracking-wider">Tenaga Pendidik</div>
            <div class="text-2xl sm:text-3xl font-extrabold text-white mt-1">{{ $teacherCount }}</div>
            <a href="{{ route('operator.teachers', [], false) }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Guru &rarr;</a>
        </div>
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-lg sm:text-xl font-bold border border-[#835841] shrink-0">
            <i class="fa-solid fa-chalkboard-user"></i>
        </div>
    </div>

    <div class="bg-secondary p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-[10px] sm:text-xs text-primary font-bold uppercase tracking-wider">Fasilitas</div>
            <div class="text-2xl sm:text-3xl font-extrabold text-white mt-1">{{ $facilityCount }}</div>
            <a href="{{ route('operator.facilities', [], false) }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Fasilitas &rarr;</a>
        </div>
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-lg sm:text-xl font-bold border border-[#835841] shrink-0">
            <i class="fa-solid fa-building-user"></i>
        </div>
    </div>

    <div class="bg-secondary p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-[10px] sm:text-xs text-primary font-bold uppercase tracking-wider">Berita & PPDB</div>
            <div class="text-2xl sm:text-3xl font-extrabold text-white mt-1">{{ $postCount }}</div>
            <a href="{{ route('operator.posts', [], false) }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Berita &rarr;</a>
        </div>
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-lg sm:text-xl font-bold border border-[#835841] shrink-0">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>

    <div class="bg-secondary p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-[10px] sm:text-xs text-primary font-bold uppercase tracking-wider">Foto Galeri</div>
            <div class="text-2xl sm:text-3xl font-extrabold text-white mt-1">{{ $galleryCount }}</div>
            <a href="{{ route('operator.gallery', [], false) }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Galeri &rarr;</a>
        </div>
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-lg sm:text-xl font-bold border border-[#835841] shrink-0">
            <i class="fa-solid fa-images"></i>
        </div>
    </div>

</div>

<!-- Quick Overview Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
    
    <!-- Left: Profile Summary -->
    <div class="lg:col-span-7 bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-[#9e6f54] pb-4 gap-2">
            <h3 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-school-flag text-primary"></i> Informasi Profil Sekolah
            </h3>
            <a href="{{ route('operator.profile', [], false) }}" class="self-start sm:self-auto px-3 py-1.5 rounded-lg bg-primary text-secondary-950 text-xs font-extrabold hover:bg-primary-200 transition shadow-sm">
                <i class="fa-solid fa-pen-to-square"></i> Edit Profil
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 text-xs">
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Nama Sekolah:</span>
                <div class="font-bold text-white text-xs sm:text-sm mt-0.5">{{ $profile->name ?? 'SDN Tunggaljaya 2' }}</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">NPSN / Akreditasi:</span>
                <div class="font-bold text-white text-xs sm:text-sm mt-0.5">{{ $profile->npsn ?? '-' }} ({{ $profile->akreditasi ?? 'A' }})</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Kepala Sekolah:</span>
                <div class="font-bold text-white text-xs sm:text-sm mt-0.5">{{ $profile->principal_name ?? '-' }}</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Jumlah Siswa / Kelas:</span>
                <div class="font-bold text-white text-xs sm:text-sm mt-0.5">{{ $profile->student_count ?? 0 }} Siswa ({{ $profile->class_count ?? 0 }} Rombel)</div>
            </div>
        </div>

        <div class="p-3.5 sm:p-4 bg-[#9e6f54] rounded-xl border border-[#835841] text-xs text-white space-y-1">
            <div class="font-bold flex items-center gap-1.5 text-primary">
                <i class="fa-solid fa-eye"></i> Visi Sekolah Saat Ini:
            </div>
            <p class="italic font-medium text-[#fdfbf9]">"{{ $profile->vision }}"</p>
        </div>
    </div>

    <!-- Right: Recent Posts -->
    <div class="lg:col-span-5 bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <div class="flex items-center justify-between border-b border-[#9e6f54] pb-4">
            <h3 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-newspaper text-primary"></i> Berita Terakhir
            </h3>
            <a href="{{ route('operator.posts', [], false) }}" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
        </div>

        <div class="space-y-3">
            @forelse($recentPosts as $post)
                <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841] flex items-center justify-between gap-2">
                    <div class="min-w-0">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#3b2116] text-primary border border-[#6d4330] inline-block mb-1">{{ $post->category }}</span>
                        <h4 class="text-xs font-bold text-white truncate">{{ $post->title }}</h4>
                        <span class="text-[10px] text-primary-200 font-medium block mt-0.5">{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <p class="text-xs text-primary-200 py-4 text-center">Belum ada berita yang diterbitkan.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection




