@extends('layouts.guest')

@section('title', 'Profil SDN Tunggaljaya 2 - Sekolah Dasar Unggul Sumur Pandeglang')

@section('content')

<!-- 1. HERO SECTION (FLAT DARK SLATE) -->
<section id="beranda" class="bg-slate-900 text-white py-20 lg:py-28 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg bg-amber-500/20 border border-amber-400/40 text-amber-300 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-award"></i> Sekolah Dasar Penggerak & Berakreditasi A
                </div>
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                    Membentuk Generasi <span class="text-amber-400">Cerdas, Berkarakter & Inovatif</span>
                </h1>
                
                <p class="text-base text-slate-300 max-w-2xl leading-relaxed">
                    Selamat datang di {{ $profile->name ?? 'SDN Tunggaljaya 2' }}. Kami menghadirkan lingkungan belajar yang aman, menyenangkan, berteknologi modern, dan kaya prestasi bagi tumbuh kembang putra-putri Anda.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="#berita" class="px-6 py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-sm shadow transition flex items-center gap-2">
                        <i class="fa-solid fa-bullhorn"></i> Info PPDB & Berita
                    </a>
                    <a href="#visimisi" class="px-6 py-3.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm border border-slate-700 transition flex items-center gap-2">
                        <i class="fa-solid fa-compass"></i> Jelajahi Visi Misi
                    </a>
                </div>

                <!-- QUICK STATS COUNTERS -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-slate-800 max-w-lg mx-auto lg:mx-0">
                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                        <div class="text-2xl font-extrabold text-amber-400">{{ $profile->student_count ?? 384 }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-1">Siswa Aktif</div>
                    </div>
                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                        <div class="text-2xl font-extrabold text-emerald-400">{{ $profile->teacher_count ?? 24 }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-1">Guru & Staf</div>
                    </div>
                    <div class="bg-slate-950 p-4 rounded-xl border border-slate-800">
                        <div class="text-2xl font-extrabold text-sky-400">{{ $profile->class_count ?? 12 }}</div>
                        <div class="text-xs text-slate-400 font-medium mt-1">Rombongan Belajar</div>
                    </div>
                </div>

            </div>

            <!-- Right Visual Banner Card -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="w-full max-w-md bg-slate-950 rounded-2xl overflow-hidden border border-slate-800 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop" 
                         alt="Gedung SDN Tunggaljaya 2" 
                         class="w-full h-64 object-cover">
                    
                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between text-xs text-amber-400 font-bold uppercase">
                            <span><i class="fa-solid fa-location-dot"></i> Sumur, Pandeglang</span>
                            <span><i class="fa-solid fa-shield-check"></i> Terakreditasi A</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">
                            SD Negeri Tunggaljaya 2
                        </h3>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Sekolah ramah anak dengan fasilitas laboratorium komputer, perpustakaan digital, dan pembinaan karakter berbasis nilai luhur.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. SAMBUTAN KEPALA SEKOLAH (FLAT DARK SLATE) -->
<section id="sambutan" class="py-20 bg-slate-950 border-b border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-900 rounded-2xl text-white p-8 lg:p-12 border border-slate-800 shadow-xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Principal Photo -->
                <div class="lg:col-span-4 flex flex-col items-center text-center">
                    <div class="w-48 h-48 lg:w-56 lg:h-56 rounded-2xl overflow-hidden border-4 border-amber-500 shadow-lg mb-4 bg-slate-950">
                        <img src="{{ $profile->principal_photo ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $profile->principal_name ?? 'Kepala Sekolah' }}"
                             class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-base font-bold text-white">{{ $profile->principal_name ?? 'Hj. Siti Rahmawati, S.Pd., M.M.' }}</h4>
                    <p class="text-xs text-amber-400 font-semibold">Kepala Sekolah SDN Tunggaljaya 2</p>
                </div>

                <!-- Welcome Text -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-block px-3 py-1 rounded bg-amber-500/20 text-amber-300 text-xs font-bold uppercase">
                        <i class="fa-solid fa-quote-left mr-1"></i> Sambutan Kepala Sekolah
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-extrabold text-white leading-snug">
                        Menyiapkan Generasi Berilmu & Berakhlak Mulia
                    </h2>
                    <p class="text-slate-300 text-sm lg:text-base leading-relaxed italic border-l-4 border-amber-500 pl-4 py-1 bg-slate-950/60 rounded-r-lg">
                        "{{ $profile->principal_welcome ?? 'Selamat datang di Website Resmi SDN Tunggaljaya 2. Kami berkomitmen untuk menyelenggarakan pendidikan dasar yang berkarakter, inovatif, berbasis teknologi modern, dan berlandaskan nilai-nilai imtak serta iptek.' }}"
                    </p>
                    <div class="pt-2 text-xs text-emerald-400 flex items-center gap-2 font-semibold">
                        <i class="fa-solid fa-circle-check"></i> SDN Tunggaljaya 2 - Siap Melayani & Mengabdi Bagi Bangsa
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. VISI & MISI SEKOLAH (FLAT DARK SLATE) -->
<section id="visimisi" class="py-20 bg-slate-900 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-amber-500/20 text-amber-300 text-xs font-bold uppercase tracking-wider">Arah & Tujuan</span>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Visi & Misi Sekolah</h2>
            <p class="text-slate-400 text-sm">Landasan dan dorongan utama kami dalam menyelenggarakan pendidikan di SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Visi Card -->
            <div class="lg:col-span-5 bg-slate-950 text-white rounded-2xl p-8 border border-slate-800 shadow-xl flex flex-col justify-between">
                <div class="space-y-6">
                    <div class="w-12 h-12 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white">Visi Sekolah</h3>
                    <blockquote class="text-base font-semibold text-amber-300 leading-relaxed italic border-l-4 border-amber-500 pl-4">
                        "{{ $profile->vision ?? 'Terwujudnya Peserta Didik yang Budi Pekerti Luhur, Cerdas, Inovatif, Berwawasan Lingkungan, dan Unggul dalam Prestasi.' }}"
                    </blockquote>
                </div>
                <div class="pt-6 text-xs text-slate-500 border-t border-slate-900 mt-6">
                    SDN Tunggaljaya 2 - Sumur Pandeglang
                </div>
            </div>

            <!-- Misi Card -->
            <div class="lg:col-span-7 bg-slate-950 text-white rounded-2xl p-8 border border-slate-800 shadow-xl">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500 text-slate-950 flex items-center justify-center text-xl font-bold">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Misi Sekolah</h3>
                        <p class="text-xs text-slate-400">Langkah nyata pencapaian visi lembaga</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @if(is_array($profile->mission) && count($profile->mission) > 0)
                        @foreach($profile->mission as $index => $misi)
                            <div class="flex items-start gap-3.5 p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="w-7 h-7 rounded-lg bg-emerald-500/20 text-emerald-400 font-extrabold flex items-center justify-center shrink-0 text-xs border border-emerald-500/30">
                                    {{ $index + 1 }}
                                </span>
                                <p class="text-slate-200 text-xs sm:text-sm leading-relaxed font-medium pt-0.5">{{ $misi }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-4 rounded-xl bg-slate-900 text-slate-300 text-xs space-y-2">
                            <p>1. Menyelenggarakan pembelajaran berorientasi pada pengembangan karakter Islami dan budi pekerti luhur.</p>
                            <p>2. Mengembangkan pembelajaran aktif, kreatif, efektif, dan menyenangkan berbasis teknologi digital.</p>
                            <p>3. Menumbuhkan semangat berprestasi dalam bidang akademik, seni, dan olahraga.</p>
                            <p>4. Menciptakan lingkungan sekolah yang bersih, hijau, dan sehat.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</section>

<!-- 4. GURU & TENAGA KEPENDIDIKAN (FLAT DARK SLATE) -->
<section id="guru" class="py-20 bg-slate-950 border-b border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-amber-500/20 text-amber-300 text-xs font-bold uppercase tracking-wider">Sumber Daya Manusia</span>
                <h2 class="text-3xl font-extrabold text-white tracking-tight mt-2">Tenaga Pendidik & Kependidikan</h2>
                <p class="text-slate-400 text-sm mt-1">Guru-guru profesional yang ramah dan berdedikasi tinggi membimbing para siswa.</p>
            </div>
            <div class="text-slate-300 text-xs font-bold bg-slate-900 border border-slate-800 px-3 py-2 rounded-xl">
                <i class="fa-solid fa-users text-amber-400 mr-1"></i> Total {{ count($teachers) }} Tenaga Pendidik
            </div>
        </div>

        <!-- Teachers Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($teachers as $teacher)
                <div class="bg-slate-900 rounded-2xl border border-slate-800 overflow-hidden flex flex-col justify-between hover:border-amber-400 transition">
                    <div class="p-6 text-center space-y-3">
                        <div class="w-28 h-28 rounded-full overflow-hidden mx-auto border-2 border-amber-500 shadow-md">
                            <img src="{{ $teacher->photo ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400&auto=format&fit=crop' }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">{{ $teacher->name }}</h3>
                            <p class="text-xs font-semibold text-amber-400 mt-1">{{ $teacher->position }}</p>
                        </div>
                    </div>
                    <div class="bg-slate-950 px-6 py-2.5 border-t border-slate-800 text-xs text-slate-400 text-center font-mono">
                        <i class="fa-solid fa-id-card text-slate-500 mr-1"></i> NIP: {{ $teacher->nip ?? '-' }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 5. FASILITAS SEKOLAH (FLAT DARK SLATE) -->
<section id="fasilitas" class="py-20 bg-slate-900 border-b border-slate-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-emerald-500/20 text-emerald-400 text-xs font-bold uppercase tracking-wider">Sarana & Prasarana</span>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Fasilitas Penunjang Belajar</h2>
            <p class="text-slate-400 text-sm">Fasilitas modern yang dirancang untuk mendukung kenyamanan dan proses pembelajaran siswa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($facilities as $facility)
                <div class="bg-slate-950 rounded-2xl overflow-hidden border border-slate-800 flex flex-col justify-between hover:border-emerald-500 transition">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $facility->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $facility->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-slate-950 p-2 rounded-lg text-amber-400 text-base border border-slate-800">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="p-5 space-y-2">
                        <h3 class="text-base font-bold text-white">{{ $facility->name }}</h3>
                        <p class="text-xs text-slate-300 leading-relaxed">{{ $facility->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 6. BERITA & PENGUMUMAN / PPDB (FLAT DARK SLATE) -->
<section id="berita" class="py-20 bg-slate-950 border-b border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-amber-500/20 text-amber-300 text-xs font-bold uppercase tracking-wider">Kabar Terbaru</span>
                <h2 class="text-3xl font-extrabold text-white tracking-tight mt-2">Berita, Pengumuman & PPDB</h2>
                <p class="text-slate-400 text-sm mt-1">Dapatkan update seputar kegiatan sekolah, prestasi siswa, dan penerimaan peserta didik baru.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
                <article class="bg-slate-900 rounded-2xl overflow-hidden border border-slate-800 flex flex-col justify-between hover:border-amber-400 transition">
                    <div>
                        <div class="relative h-44 overflow-hidden">
                            <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop' }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-md bg-amber-500 text-slate-950 font-extrabold text-xs shadow">
                                {{ $post->category }}
                            </span>
                        </div>
                        <div class="p-5 space-y-2.5">
                            <div class="text-xs text-amber-400 font-semibold flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                            </div>
                            <h3 class="text-base font-bold text-white hover:text-amber-400 transition leading-snug line-clamp-2">
                                <a href="{{ route('news.detail', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-300 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="{{ route('news.detail', $post->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold text-amber-400 hover:text-amber-300 transition">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

<!-- 7. GALERI KEGIATAN (FLAT DARK SLATE) -->
<section id="galeri" class="py-20 bg-slate-900 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-purple-500/20 text-purple-300 text-xs font-bold uppercase tracking-wider">Dokumentasi</span>
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Galeri Kegiatan Sekolah</h2>
            <p class="text-slate-400 text-sm">Momen-momen berharga pembelajaran, karya, dan prestasi siswa SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $gallery)
                <div class="relative group rounded-2xl overflow-hidden aspect-video bg-slate-950 border border-slate-800">
                    <img src="{{ $gallery->image }}" 
                         alt="{{ $gallery->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition transform duration-300">
                    <div class="absolute inset-0 bg-slate-950/80 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-5">
                        <span class="text-xs text-amber-400 font-bold uppercase mb-1">{{ $gallery->category }}</span>
                        <h4 class="text-white font-bold text-sm">{{ $gallery->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 8. KONTAK & LOKASI INTERAKTIF (FLAT DARK SLATE) -->
<section id="kontak" class="py-20 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-5 space-y-6">
                <span class="px-3.5 py-1.5 rounded-lg bg-amber-500/20 text-amber-300 text-xs font-bold uppercase tracking-wider">Hubungi Kami</span>
                <h2 class="text-3xl font-extrabold text-white">Lokasi & Sekretariat PPDB</h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Kunjungi langsung kampus SDN Tunggaljaya 2 atau hubungi nomor layanan informasi kami pada jam kerja sekolah.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-900 border border-slate-800">
                        <div class="w-10 h-10 rounded-lg bg-amber-500 text-slate-950 flex items-center justify-center font-bold text-lg shrink-0">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Alamat Lengkap</h4>
                            <p class="text-xs text-slate-300 mt-1 leading-relaxed">{{ $profile->address }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-900 border border-slate-800">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500 text-slate-950 flex items-center justify-center font-bold text-lg shrink-0">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Telepon / WhatsApp</h4>
                            <p class="text-xs text-slate-300 mt-1">{{ $profile->phone }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-900 border border-slate-800">
                        <div class="w-10 h-10 rounded-lg bg-sky-500 text-slate-950 flex items-center justify-center font-bold text-lg shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Email Resmi</h4>
                            <p class="text-xs text-slate-300 mt-1">{{ $profile->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Map Embed -->
            <div class="lg:col-span-7">
                <div class="bg-slate-900 p-3 rounded-2xl border border-slate-800 shadow-xl">
                    <iframe src="{{ $profile->map_url ?? 'https://maps.google.com/maps?q=Sumur+Pandeglang&t=&z=13&ie=UTF8&iwloc=&output=embed' }}" 
                            class="w-full h-96 rounded-xl border-0" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
