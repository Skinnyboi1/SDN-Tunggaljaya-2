@extends('layouts.guest')

@section('title', $post->title . ' - SDN Tunggaljaya 2')

@section('content')

<section class="py-16 bg-slate-900 text-white border-b border-slate-800">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="px-3.5 py-1.5 rounded-lg bg-amber-500 text-slate-950 text-xs font-extrabold uppercase tracking-wider">
            {{ $post->category }}
        </span>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-tight">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-center gap-4 text-xs text-slate-400 font-semibold">
            <span><i class="fa-regular fa-calendar text-amber-400 mr-1"></i> {{ $post->published_at ? $post->published_at->format('d M Y, H:i') : date('d M Y') }} WIB</span>
            <span>&bull;</span>
            <span><i class="fa-solid fa-user-pen text-emerald-400 mr-1"></i> {{ $post->author->name ?? 'Admin Sekolah' }}</span>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-950 text-slate-200">
    <div class="max-w-4xl mx-auto px-4">
        
        @if($post->image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-xl border border-slate-800">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full max-h-[480px] object-cover">
            </div>
        @endif

        <div class="bg-slate-900 p-8 rounded-2xl border border-slate-800 space-y-6 text-slate-200 text-sm sm:text-base leading-relaxed">
            {!! $post->content !!}
        </div>

        <!-- Back Button -->
        <div class="mt-10 pt-6 border-t border-slate-900 flex justify-between items-center">
            <a href="{{ route('home') }}#berita" class="px-5 py-2.5 rounded-xl bg-amber-500 text-slate-950 font-extrabold text-sm hover:bg-amber-400 transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>

    </div>
</section>

@endsection
