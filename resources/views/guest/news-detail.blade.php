@extends('layouts.guest')

@section('title', $post->title . ' - SDN Tunggaljaya 2')

@section('content')

<section class="py-8 sm:py-16 bg-secondary text-white border-b border-[#9e6f54] shadow-md">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3 sm:space-y-4">
        <span class="px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-lg bg-[#3b2116] text-primary text-[11px] sm:text-xs font-extrabold uppercase tracking-wider shadow-sm border border-[#6d4330]">
            {{ $post->category }}
        </span>
        <h1 class="text-xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-tight">
            {{ $post->title }}
        </h1>
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 text-xs text-primary font-semibold">
            <span><i class="fa-regular fa-calendar text-primary mr-1"></i> {{ $post->published_at ? $post->published_at->format('d M Y, H:i') : date('d M Y') }} WIB</span>
            <span class="hidden sm:inline">&bull;</span>
            <span><i class="fa-solid fa-user-pen text-primary mr-1"></i> {{ $post->author->name ?? 'Admin Sekolah' }}</span>
        </div>
    </div>
</section>

<section class="py-8 sm:py-16 bg-primary text-slate-800">
    <div class="max-w-4xl mx-auto px-4">
        
        @if($post->image)
            <div class="mb-6 sm:mb-10 rounded-2xl overflow-hidden shadow-xl border border-[#9e6f54]">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full max-h-[300px] sm:max-h-[480px] object-cover">
            </div>
        @endif

        <div class="bg-secondary text-white p-5 sm:p-8 lg:p-10 rounded-2xl border border-[#9e6f54] shadow-xl space-y-6 text-sm sm:text-base leading-relaxed">
            <div class="prose prose-invert max-w-none text-[#fdfbf9] space-y-4">
                {!! $post->content !!}
            </div>
        </div>

        <!-- Back Button -->
        <div class="mt-8 sm:mt-10 pt-6 border-t border-[#e4bca2] flex justify-between items-center">
            <a href="{{ route('home') }}#berita" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-secondary text-white font-extrabold text-xs sm:text-sm hover:bg-secondary-600 transition flex items-center justify-center gap-2 shadow-md border border-[#9e6f54]">
                <i class="fa-solid fa-arrow-left text-primary"></i> Kembali ke Beranda
            </a>
        </div>

    </div>
</section>

@endsection




