@extends('layouts.operator')

@section('title', 'Kelola Berita & PPDB - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Berita & Pengumuman PPDB')

@section('content')

<div class="space-y-8">
    
    <!-- Add Post Form -->
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <i class="fa-solid fa-pen-nib text-brand-600"></i> Buat Berita / Pengumuman / PPDB Baru
        </h2>

        <form action="{{ route('operator.posts.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Judul Artikel / Pengumuman</label>
                    <input type="text" name="title" required placeholder="Contoh: Info Penerimaan Siswa Baru Tahun 2026" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Kategori</label>
                    <select name="category" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs font-bold">
                        <option value="Berita">Berita</option>
                        <option value="Pengumuman">Pengumuman (PPDB)</option>
                        <option value="Prestasi">Prestasi Siswa</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Ringkasan Singkat (Excerpt)</label>
                    <input type="text" name="excerpt" placeholder="Ringkasan 1-2 kalimat..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">URL Gambar Header (Image Link)</label>
                    <input type="text" name="image" placeholder="https://..." class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-xs">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Isi Lengkap Konten (HTML / Teks)</label>
                <textarea name="content" rows="4" required placeholder="Tulis isi pengumuman atau berita di sini..." class="w-full p-4 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:outline-none focus:border-amber-500"></textarea>
            </div>

            <div class="flex items-center justify-between pt-2">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                    <input type="checkbox" name="is_published" value="1" checked class="rounded bg-slate-100 border-slate-300 text-amber-500 focus:ring-0">
                    <span>Terbitkan Langsung ke Publik</span>
                </label>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-brand-700 hover:bg-brand-800 text-white font-extrabold text-xs shadow transition flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Publikasikan Konten
                </button>
            </div>
        </form>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h3 class="text-base font-bold text-slate-900">Daftar Konten Diterbitkan ({{ count($posts) }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 text-slate-500 uppercase font-bold border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Judul</th>
                        <th class="px-6 py-3.5">Kategori</th>
                        <th class="px-6 py-3.5">Tanggal Publish</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($posts as $post)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-3 font-bold text-slate-900">
                                <a href="{{ route('news.detail', $post->slug) }}" target="_blank" class="hover:text-brand-600">{{ $post->title }}</a>
                            </td>
                            <td class="px-6 py-3">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                    {{ $post->category }}
                                </span>
                            </td>
                            <td class="px-6 py-3 font-mono text-slate-500">{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</td>
                            <td class="px-6 py-3 text-right">
                                <form action="{{ route('operator.posts.delete', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
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
                            <td colspan="4" class="px-6 py-8 text-center text-slate-400">Belum ada konten berita atau pengumuman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
