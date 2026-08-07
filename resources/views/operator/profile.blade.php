@extends('layouts.operator')

@section('title', 'Edit Profil Sekolah - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Profil Sekolah')

@section('content')

<div class="max-w-4xl bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
    
    <div>
        <h2 class="text-xl font-bold text-slate-900">Form Pengeditan Profil Sekolah</h2>
        <p class="text-xs text-slate-500">Perubahan informasi di halaman ini akan langsung diperbarui di tampilan publik (Guest).</p>
    </div>

    <form action="{{ route('operator.profile.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Identitas Utama -->
        <div class="border-b border-slate-200 pb-6 space-y-4">
            <h3 class="text-sm font-bold text-amber-600 uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-school"></i> Identitas Utama Sekolah
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Sekolah</label>
                    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">NPSN</label>
                    <input type="text" name="npsn" value="{{ old('npsn', $profile->npsn) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Akreditasi</label>
                    <input type="text" name="akreditasi" value="{{ old('akreditasi', $profile->akreditasi) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nama Kepala Sekolah</label>
                    <input type="text" name="principal_name" value="{{ old('principal_name', $profile->principal_name) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">URL Foto Kepala Sekolah (Image Link)</label>
                <input type="text" name="principal_photo" value="{{ old('principal_photo', $profile->principal_photo) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Sambutan Kepala Sekolah</label>
                <textarea name="principal_welcome" rows="4" class="w-full p-4 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">{{ old('principal_welcome', $profile->principal_welcome) }}</textarea>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="border-b border-slate-200 pb-6 space-y-4">
            <h3 class="text-sm font-bold text-amber-600 uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-compass"></i> Visi & Misi Sekolah
            </h3>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Visi Sekolah</label>
                <textarea name="vision" rows="2" class="w-full p-4 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">{{ old('vision', $profile->vision) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Misi Sekolah (Satu misi per baris/line)</label>
                <textarea name="mission_text" rows="5" class="w-full p-4 bg-slate-50 border border-slate-300 rounded-xl text-sm font-mono focus:outline-none focus:border-amber-500">{{ old('mission_text', is_array($profile->mission) ? implode("\n", $profile->mission) : '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Sejarah & Gambaran Umum Sekolah</label>
                <textarea name="history" rows="3" class="w-full p-4 bg-slate-50 border border-slate-300 rounded-xl text-sm focus:outline-none focus:border-amber-500">{{ old('history', $profile->history) }}</textarea>
            </div>
        </div>

        <!-- Statistik Peserta Didik & Kontak -->
        <div class="space-y-4">
            <h3 class="text-sm font-bold text-amber-600 uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-address-book"></i> Statistik & Kontak
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Jumlah Siswa</label>
                    <input type="number" name="student_count" value="{{ old('student_count', $profile->student_count) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Jumlah Guru/Staf</label>
                    <input type="number" name="teacher_count" value="{{ old('teacher_count', $profile->teacher_count) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Jumlah Rombel/Kelas</label>
                    <input type="number" name="class_count" value="{{ old('class_count', $profile->class_count) }}" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Email Sekolah</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Lengkap</label>
                <input type="text" name="address" value="{{ old('address', $profile->address) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Google Maps Embed URL</label>
                <input type="text" name="map_url" value="{{ old('map_url', $profile->map_url) }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-sm">
            </div>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-sm shadow-md transition flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Profil
            </button>
        </div>

    </form>

</div>

@endsection
