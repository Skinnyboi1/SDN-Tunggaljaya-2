@extends('layouts.guest')

@section('title', 'Profil SDN Tunggaljaya 2 - Sekolah Dasar Unggul Sumur Pandeglang')

@section('content')

<!-- 1. HERO SECTION -->
<section id="beranda" class="bg-primary text-slate-900 py-20 lg:py-28 border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">
                    <i class="fa-solid fa-award text-primary"></i> Sekolah Dasar Penggerak & Berakreditasi A
                </div>
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Membentuk Generasi <span class="text-secondary">Cerdas, Berkarakter & Inovatif</span>
                </h1>
                
                <p class="text-base text-[#6d4330] max-w-2xl leading-relaxed font-medium">
                    Selamat datang di {{ $profile->name ?? 'SDN Tunggaljaya 2' }}. Kami menghadirkan lingkungan belajar yang aman, menyenangkan, berteknologi modern, dan kaya prestasi bagi tumbuh kembang putra-putri Anda.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="#berita" class="px-6 py-3.5 rounded-xl bg-secondary hover:bg-secondary-600 text-white font-extrabold text-sm shadow-md transition flex items-center gap-2">
                        <i class="fa-solid fa-bullhorn text-primary"></i> Info PPDB & Berita
                    </a>
                    <a href="#visimisi" class="px-6 py-3.5 rounded-xl bg-[#3b2116] hover:bg-[#2a170f] text-primary font-bold text-sm transition flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-compass text-secondary"></i> Jelajahi Visi Misi
                    </a>
                </div>

                <!-- QUICK STATS COUNTERS (CHANGED TO #b68a70) -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-[#e4bca2] max-w-lg mx-auto lg:mx-0">
                    <div class="bg-secondary p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-2xl font-extrabold text-white">{{ $profile->student_count ?? 384 }}</div>
                        <div class="text-xs text-primary font-semibold mt-1">Siswa Aktif</div>
                    </div>
                    <div class="bg-secondary p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-2xl font-extrabold text-white">{{ $profile->teacher_count ?? 24 }}</div>
                        <div class="text-xs text-primary font-semibold mt-1">Guru & Staf</div>
                    </div>
                    <div class="bg-secondary p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-2xl font-extrabold text-white">{{ $profile->class_count ?? 12 }}</div>
                        <div class="text-xs text-primary font-semibold mt-1">Rombongan Belajar</div>
                    </div>
                </div>

            </div>

            <!-- Right Visual Banner Card -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="w-full max-w-md bg-secondary rounded-2xl overflow-hidden border border-[#9e6f54] shadow-xl text-white">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop" 
                         alt="Gedung SDN Tunggaljaya 2" 
                         class="w-full h-64 object-cover">
                    
                    <div class="p-6 space-y-3">
                        <div class="flex items-center justify-between text-xs text-primary font-bold uppercase">
                            <span><i class="fa-solid fa-location-dot"></i> Sumur, Pandeglang</span>
                            <span><i class="fa-solid fa-shield-check"></i> Terakreditasi A</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">
                            SD Negeri Tunggaljaya 2
                        </h3>
                        <p class="text-xs text-primary-100 leading-relaxed font-medium">
                            Sekolah ramah anak dengan fasilitas laboratorium komputer, perpustakaan digital, dan pembinaan karakter berbasis nilai luhur.
                        </p>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<!-- 2. SAMBUTAN KEPALA SEKOLAH (CHANGED TO #b68a70) -->
<section id="sambutan" class="py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-secondary rounded-2xl text-white p-8 lg:p-12 border border-[#9e6f54] shadow-xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Principal Photo -->
                <div class="lg:col-span-4 flex flex-col items-center text-center">
                    <div class="w-48 h-48 lg:w-56 lg:h-56 rounded-2xl overflow-hidden border-4 border-primary shadow-lg mb-4 bg-[#9e6f54]">
                        <img src="{{ $profile->principal_photo ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $profile->principal_name ?? 'Kepala Sekolah' }}"
                             class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-base font-bold text-white">{{ $profile->principal_name ?? 'Hj. Siti Rahmawati, S.Pd., M.M.' }}</h4>
                    <p class="text-xs text-primary font-bold">Kepala Sekolah SDN Tunggaljaya 2</p>
                </div>

                <!-- Welcome Text -->
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-block px-3 py-1 rounded-lg bg-[#9e6f54] text-primary text-xs font-bold uppercase border border-[#835841]">
                        <i class="fa-solid fa-quote-left mr-1"></i> Sambutan Kepala Sekolah
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-extrabold text-white leading-snug">
                        Menyiapkan Generasi Berilmu & Berakhlak Mulia
                    </h2>
                    <p class="text-[#fdfbf9] text-sm lg:text-base leading-relaxed italic border-l-4 border-primary pl-4 py-3 bg-[#9e6f54] rounded-r-lg">
                        "{{ $profile->principal_welcome ?? 'Selamat datang di Website Resmi SDN Tunggaljaya 2. Kami berkomitmen untuk menyelenggarakan pendidikan dasar yang berkarakter, inovatif, berbasis teknologi modern, dan berlandaskan nilai-nilai imtak serta iptek.' }}"
                    </p>
                    <div class="pt-2 text-xs text-primary flex items-center gap-2 font-bold">
                        <i class="fa-solid fa-circle-check text-primary"></i> SDN Tunggaljaya 2 - Siap Melayani & Mengabdi Bagi Bangsa
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 3. VISI & MISI SEKOLAH (CHANGED TO #b68a70) -->
<section id="visimisi" class="py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Arah & Tujuan</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Visi & Misi Sekolah</h2>
            <p class="text-[#6d4330] text-sm">Landasan dan dorongan utama kami dalam menyelenggarakan pendidikan di SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Visi Card -->
            <div class="lg:col-span-5 bg-secondary text-white rounded-2xl p-8 border border-[#9e6f54] shadow-xl flex flex-col justify-between">
                <div class="space-y-6">
                    <div class="w-12 h-12 rounded-xl bg-primary text-secondary flex items-center justify-center text-xl font-bold shadow">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white">Visi Sekolah</h3>
                    <blockquote class="text-base font-semibold text-primary leading-relaxed italic border-l-4 border-primary pl-4">
                        "{{ $profile->vision ?? 'Terwujudnya Peserta Didik yang Budi Pekerti Luhur, Cerdas, Inovatif, Berwawasan Lingkungan, dan Unggul dalam Prestasi.' }}"
                    </blockquote>
                </div>
                <div class="pt-6 text-xs text-primary-200 border-t border-[#9e6f54] mt-6 font-semibold">
                    SDN Tunggaljaya 2 - Sumur Pandeglang
                </div>
            </div>

            <!-- Misi Card -->
            <div class="lg:col-span-7 bg-secondary text-white rounded-2xl p-8 border border-[#9e6f54] shadow-xl">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary text-secondary flex items-center justify-center text-xl font-bold shadow">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Misi Sekolah</h3>
                        <p class="text-xs text-primary">Langkah nyata pencapaian visi lembaga</p>
                    </div>
                </div>

                <div class="space-y-3">
                    @if(is_array($profile->mission) && count($profile->mission) > 0)
                        @foreach($profile->mission as $index => $misi)
                            <div class="flex items-start gap-3.5 p-4 rounded-xl bg-[#9e6f54] border border-[#835841]">
                                <span class="w-7 h-7 rounded-lg bg-primary text-secondary font-extrabold flex items-center justify-center shrink-0 text-xs shadow-xs">
                                    {{ $index + 1 }}
                                </span>
                                <p class="text-[#fdfbf9] text-xs sm:text-sm leading-relaxed font-medium pt-0.5">{{ $misi }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="p-4 rounded-xl bg-[#9e6f54] text-[#fdfbf9] text-xs space-y-2">
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

<!-- 4. GURU & TENAGA KEPENDIDIKAN (CHANGED TO #b68a70) -->
<section id="guru" class="py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Sumber Daya Manusia</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Tenaga Pendidik & Kependidikan</h2>
                <p class="text-[#6d4330] text-sm mt-1">Guru-guru profesional yang ramah dan berdedikasi tinggi membimbing para siswa.</p>
            </div>
            <div class="text-white text-xs font-bold bg-secondary border border-[#9e6f54] px-3 py-2 rounded-xl shadow-sm">
                <i class="fa-solid fa-users text-primary mr-1"></i> Total {{ count($teachers) }} Tenaga Pendidik
            </div>
        </div>

        <!-- Teachers Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($teachers as $teacher)
                <div class="bg-secondary rounded-2xl border border-[#9e6f54] overflow-hidden flex flex-col justify-between shadow-md hover:border-primary transition">
                    <div class="p-6 text-center space-y-3">
                        <div class="w-28 h-28 rounded-full overflow-hidden mx-auto border-4 border-primary shadow-md">
                            <img src="{{ $teacher->photo ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400&auto=format&fit=crop' }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">{{ $teacher->name }}</h3>
                            <p class="text-xs font-semibold text-primary mt-1">{{ $teacher->position }}</p>
                        </div>
                    </div>
                    <div class="bg-[#9e6f54] px-6 py-2.5 border-t border-[#835841] text-xs text-primary-200 text-center font-mono">
                        <i class="fa-solid fa-id-card text-primary mr-1"></i> NIP: {{ $teacher->nip ?? '-' }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 5. FASILITAS SEKOLAH (CHANGED TO #b68a70) -->
<section id="fasilitas" class="py-20 bg-primary border-b border-[#e4bca2] text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Sarana & Prasarana</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Fasilitas Penunjang Belajar</h2>
            <p class="text-[#6d4330] text-sm">Fasilitas modern yang dirancang untuk mendukung kenyamanan dan proses pembelajaran siswa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($facilities as $facility)
                <div class="bg-secondary text-white rounded-2xl overflow-hidden border border-[#9e6f54] flex flex-col justify-between shadow-md hover:border-primary transition">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $facility->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $facility->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-secondary p-2 rounded-lg text-primary text-base border border-[#9e6f54] shadow-sm">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="p-5 space-y-2">
                        <h3 class="text-base font-bold text-white">{{ $facility->name }}</h3>
                        <p class="text-xs text-primary-100 leading-relaxed">{{ $facility->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 6. BERITA & PENGUMUMAN / PPDB (CHANGED TO #b68a70) -->
<section id="berita" class="py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Kabar Terbaru</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Berita, Pengumuman & PPDB</h2>
                <p class="text-[#6d4330] text-sm mt-1">Dapatkan update seputar kegiatan sekolah, prestasi siswa, dan penerimaan peserta didik baru.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
                <article class="bg-secondary rounded-2xl overflow-hidden border border-[#9e6f54] flex flex-col justify-between shadow-md hover:border-primary transition text-white">
                    <div>
                        <div class="relative h-44 overflow-hidden">
                            <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop' }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 px-3 py-1 rounded-md bg-[#3b2116] text-primary font-extrabold text-xs shadow border border-[#6d4330]">
                                {{ $post->category }}
                            </span>
                        </div>
                        <div class="p-5 space-y-2.5">
                            <div class="text-xs text-primary font-bold flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                            </div>
                            <h3 class="text-base font-bold text-white hover:text-primary transition leading-snug line-clamp-2">
                                <a href="{{ route('news.detail', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-xs text-primary-100 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="{{ route('news.detail', $post->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold text-primary hover:text-white transition">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

<!-- 7. GALERI KEGIATAN (CHANGED TO #b68a70) -->
<section id="galeri" class="py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Dokumentasi</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Galeri Kegiatan Sekolah</h2>
            <p class="text-[#6d4330] text-sm">Momen-momen berharga pembelajaran, karya, dan prestasi siswa SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $gallery)
                <div class="relative group rounded-2xl overflow-hidden aspect-video bg-secondary border border-[#9e6f54] hover:border-primary shadow-md transition">
                    <img src="{{ $gallery->image }}" 
                         alt="{{ $gallery->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition transform duration-300">
                    <div class="absolute inset-0 bg-secondary-950/80 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-5">
                        <span class="text-xs text-primary font-bold uppercase mb-1">{{ $gallery->category }}</span>
                        <h4 class="text-white font-bold text-sm">{{ $gallery->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 8. KONTAK & LOKASI INTERAKTIF (CHANGED TO #b68a70) -->
<section id="kontak" class="py-20 bg-primary text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-5 space-y-6">
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Hubungi Kami</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Lokasi & Sekretariat PPDB</h2>
                <p class="text-[#6d4330] text-sm leading-relaxed font-medium">
                    Kunjungi langsung kampus SDN Tunggaljaya 2 atau hubungi nomor layanan informasi kami pada jam kerja sekolah.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-10 h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Alamat Lengkap</h4>
                            <p class="text-xs text-primary-100 mt-1 leading-relaxed">{{ $profile->address }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-10 h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Telepon / WhatsApp</h4>
                            <p class="text-xs text-primary-100 mt-1">{{ $profile->phone }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-10 h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Email Resmi</h4>
                            <p class="text-xs text-primary-100 mt-1">{{ $profile->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Map Embed -->
            <div class="lg:col-span-7">
                <div class="bg-secondary p-3 rounded-2xl border border-[#9e6f54] shadow-xl">
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
