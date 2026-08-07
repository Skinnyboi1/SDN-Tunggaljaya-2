@extends('layouts.operator')

@section('title', 'Dashboard Operator - SDN Tunggaljaya 2')
@section('header_title', 'Ringkasan Dashboard Operator')

@section('content')

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Tenaga Pendidik</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-1">{{ $teacherCount }}</div>
            <a href="{{ route('operator.teachers') }}" class="text-xs font-bold text-amber-600 hover:underline mt-2 inline-block">Kelola Guru &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-xl font-bold">
            <i class="fa-solid fa-chalkboard-user"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Fasilitas</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-1">{{ $facilityCount }}</div>
            <a href="{{ route('operator.facilities') }}" class="text-xs font-bold text-emerald-600 hover:underline mt-2 inline-block">Kelola Fasilitas &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl font-bold">
            <i class="fa-solid fa-building-user"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Berita & PPDB</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-1">{{ $postCount }}</div>
            <a href="{{ route('operator.posts') }}" class="text-xs font-bold text-brand-600 hover:underline mt-2 inline-block">Kelola Berita &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-xl font-bold">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
        <div>
            <div class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Foto Galeri</div>
            <div class="text-3xl font-extrabold text-slate-900 mt-1">{{ $galleryCount }}</div>
            <a href="{{ route('operator.gallery') }}" class="text-xs font-bold text-purple-600 hover:underline mt-2 inline-block">Kelola Galeri &rarr;</a>
        </div>
        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl font-bold">
            <i class="fa-solid fa-images"></i>
        </div>
    </div>

</div>

<!-- Quick Overview Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left: Profile Summary -->
    <div class="lg:col-span-7 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-school-flag text-amber-500"></i> Informasi Profil Sekolah
            </h3>
            <a href="{{ route('operator.profile') }}" class="px-3 py-1.5 rounded-lg bg-amber-500 text-slate-950 text-xs font-bold hover:bg-amber-400 transition">
                <i class="fa-solid fa-pen-to-square"></i> Edit Profil
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 text-xs">
            <div class="p-3 bg-slate-50 rounded-xl">
                <span class="text-slate-500">Nama Sekolah:</span>
                <div class="font-bold text-slate-900 text-sm mt-0.5">{{ $profile->name ?? 'SDN Tunggaljaya 2' }}</div>
            </div>
            <div class="p-3 bg-slate-50 rounded-xl">
                <span class="text-slate-500">NPSN / Akreditasi:</span>
                <div class="font-bold text-slate-900 text-sm mt-0.5">{{ $profile->npsn ?? '-' }} ({{ $profile->akreditasi ?? 'A' }})</div>
            </div>
            <div class="p-3 bg-slate-50 rounded-xl">
                <span class="text-slate-500">Kepala Sekolah:</span>
                <div class="font-bold text-slate-900 text-sm mt-0.5">{{ $profile->principal_name ?? '-' }}</div>
            </div>
            <div class="p-3 bg-slate-50 rounded-xl">
                <span class="text-slate-500">Jumlah Siswa / Kelas:</span>
                <div class="font-bold text-slate-900 text-sm mt-0.5">{{ $profile->student_count ?? 0 }} Siswa ({{ $profile->class_count ?? 0 }} Rombel)</div>
            </div>
        </div>

        <div class="p-4 bg-amber-50 rounded-xl border border-amber-200 text-xs text-amber-900 space-y-1">
            <div class="font-bold flex items-center gap-1.5">
                <i class="fa-solid fa-eye text-amber-600"></i> Visi Sekolah Saat Ini:
            </div>
            <p class="italic">"{{ $profile->vision }}"</p>
        </div>
    </div>

    <!-- Right: Recent Posts -->
    <div class="lg:col-span-5 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <i class="fa-solid fa-newspaper text-brand-600"></i> Berita Terakhir
            </h3>
            <a href="{{ route('operator.posts') }}" class="text-xs font-bold text-brand-700 hover:underline">Lihat Semua</a>
        </div>

        <div class="space-y-3">
            @forelse($recentPosts as $post)
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">{{ $post->category }}</span>
                        <h4 class="text-xs font-bold text-slate-900 mt-1 line-clamp-1">{{ $post->title }}</h4>
                        <span class="text-[10px] text-slate-400">{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <p class="text-xs text-slate-500 py-4 text-center">Belum ada berita yang diterbitkan.</p>
            @endforelse
        </div>
    </div>

</div>

@endsection
