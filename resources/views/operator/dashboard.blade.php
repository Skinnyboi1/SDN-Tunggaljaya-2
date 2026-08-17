@extends('layouts.operator')

@section('title', 'Dashboard Operator - SDN Tunggaljaya 2')
@section('header_title', 'Ringkasan Dashboard Operator')

@section('content')

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-secondary p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-xs text-primary font-bold uppercase tracking-wider">Tenaga Pendidik</div>
            <div class="text-3xl font-extrabold text-white mt-1">{{ $teacherCount }}</div>
            <a href="{{ route('operator.teachers') }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Guru &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-xl font-bold border border-[#835841]">
            <i class="fa-solid fa-chalkboard-user"></i>
        </div>
    </div>

    <div class="bg-secondary p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-xs text-primary font-bold uppercase tracking-wider">Fasilitas</div>
            <div class="text-3xl font-extrabold text-white mt-1">{{ $facilityCount }}</div>
            <a href="{{ route('operator.facilities') }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Fasilitas &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-xl font-bold border border-[#835841]">
            <i class="fa-solid fa-building-user"></i>
        </div>
    </div>

    <div class="bg-secondary p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-xs text-primary font-bold uppercase tracking-wider">Berita & PPDB</div>
            <div class="text-3xl font-extrabold text-white mt-1">{{ $postCount }}</div>
            <a href="{{ route('operator.posts') }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Berita &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-xl font-bold border border-[#835841]">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>

    <div class="bg-secondary p-6 rounded-2xl border border-[#9e6f54] shadow-md flex items-center justify-between text-white">
        <div>
            <div class="text-xs text-primary font-bold uppercase tracking-wider">Foto Galeri</div>
            <div class="text-3xl font-extrabold text-white mt-1">{{ $galleryCount }}</div>
            <a href="{{ route('operator.gallery') }}" class="text-xs font-bold text-primary hover:text-white mt-2 inline-block">Kelola Galeri &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-[#9e6f54] text-primary flex items-center justify-center text-xl font-bold border border-[#835841]">
            <i class="fa-solid fa-images"></i>
        </div>
    </div>

</div>

<!-- Quick Overview Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left: Profile Summary -->
    <div class="lg:col-span-7 bg-secondary text-white p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <div class="flex items-center justify-between border-b border-[#9e6f54] pb-4">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-school-flag text-primary"></i> Informasi Profil Sekolah
            </h3>
            <a href="{{ route('operator.profile') }}" class="px-3 py-1.5 rounded-lg bg-primary text-secondary-950 text-xs font-extrabold hover:bg-primary-200 transition shadow-sm">
                <i class="fa-solid fa-pen-to-square"></i> Edit Profil
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 text-xs">
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Nama Sekolah:</span>
                <div class="font-bold text-white text-sm mt-0.5">{{ $profile->name ?? 'SDN Tunggaljaya 2' }}</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">NPSN / Akreditasi:</span>
                <div class="font-bold text-white text-sm mt-0.5">{{ $profile->npsn ?? '-' }} ({{ $profile->akreditasi ?? 'A' }})</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Kepala Sekolah:</span>
                <div class="font-bold text-white text-sm mt-0.5">{{ $profile->principal_name ?? '-' }}</div>
            </div>
            <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841]">
                <span class="text-primary font-medium">Jumlah Siswa / Kelas:</span>
                <div class="font-bold text-white text-sm mt-0.5">{{ $profile->student_count ?? 0 }} Siswa ({{ $profile->class_count ?? 0 }} Rombel)</div>
            </div>
        </div>

        <div class="p-4 bg-[#9e6f54] rounded-xl border border-[#835841] text-xs text-white space-y-1">
            <div class="font-bold flex items-center gap-1.5 text-primary">
                <i class="fa-solid fa-eye"></i> Visi Sekolah Saat Ini:
            </div>
            <p class="italic font-medium text-[#fdfbf9]">"{{ $profile->vision }}"</p>
        </div>
    </div>

    <!-- Right: Recent Posts -->
    <div class="lg:col-span-5 bg-secondary text-white p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <div class="flex items-center justify-between border-b border-[#9e6f54] pb-4">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-newspaper text-primary"></i> Berita Terakhir
            </h3>
            <a href="{{ route('operator.posts') }}" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
        </div>

        <div class="space-y-3">
            @forelse($recentPosts as $post)
                <div class="p-3 bg-[#9e6f54] rounded-xl border border-[#835841] flex items-center justify-between">
                    <div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#3b2116] text-primary border border-[#6d4330]">{{ $post->category }}</span>
                        <h4 class="text-xs font-bold text-white mt-1 line-clamp-1">{{ $post->title }}</h4>
                        <span class="text-[10px] text-primary-200 font-medium">{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <p class="text-xs text-primary-200 py-4 text-center">Belum ada berita yang diterbitkan.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection




