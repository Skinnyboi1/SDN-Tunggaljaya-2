@extends('layouts.guest')

@section('title', 'Profil SDN Tunggaljaya 2 - Sekolah Dasar Unggul Sumur Pandeglang')

@section('content')

<!-- 1. HERO SECTION -->
<section id="beranda" class="bg-primary text-slate-900 py-12 sm:py-20 lg:py-28 border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-7 space-y-4 sm:space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 sm:px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">
                    <i class="fa-solid fa-award text-primary"></i> Sekolah Dasar Penggerak & Berakreditasi B
                </div>
                
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Membentuk Generasi <span class="text-secondary">Cerdas, Berkarakter & Inovatif</span>
                </h1>
                
                <p class="text-sm sm:text-base text-[#6d4330] max-w-2xl leading-relaxed font-medium mx-auto lg:mx-0">
                    Selamat datang di <span class="live-school-name">{{ $profile->name ?? 'SD N TUNGGALJAYA 2' }}</span>. Kami menghadirkan lingkungan belajar yang aman, menyenangkan, berteknologi modern, dan kaya prestasi bagi tumbuh kembang putra-putri Anda.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 sm:gap-4 pt-2">
                    <a href="#berita" class="px-6 py-3.5 rounded-xl bg-secondary hover:bg-secondary-600 text-white font-extrabold text-sm shadow-md transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-bullhorn text-primary"></i> Info PPDB & Berita
                    </a>
                    <a href="#visimisi" class="px-6 py-3.5 rounded-xl bg-[#3b2116] hover:bg-[#2a170f] text-primary font-bold text-sm transition flex items-center justify-center gap-2 shadow-sm">
                        <i class="fa-solid fa-compass text-secondary"></i> Jelajahi Visi Misi
                    </a>
                </div>

                <!-- QUICK STATS COUNTERS -->
                <div class="grid grid-cols-3 gap-2 sm:gap-4 pt-6 sm:pt-8 border-t border-[#e4bca2] max-w-lg mx-auto lg:mx-0">
                    <div class="bg-secondary p-3 sm:p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-xl sm:text-2xl font-extrabold text-white live-school-students">{{ $profile->student_count ?? 185 }} Siswa</div>
                        <div class="text-[10px] sm:text-xs text-primary font-semibold mt-1">Siswa Aktif</div>
                    </div>
                    <div class="bg-secondary p-3 sm:p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-xl sm:text-2xl font-extrabold text-white live-school-teachers">{{ $profile->teacher_count ?? 12 }} Guru</div>
                        <div class="text-[10px] sm:text-xs text-primary font-semibold mt-1">Guru & Staf</div>
                    </div>
                    <div class="bg-secondary p-3 sm:p-4 rounded-xl border border-[#9e6f54] shadow-sm text-center">
                        <div class="text-xl sm:text-2xl font-extrabold text-white live-school-classes">{{ $profile->class_count ?? 6 }} Rombel</div>
                        <div class="text-[10px] sm:text-xs text-primary font-semibold mt-1">Rombel</div>
                    </div>
                </div>

            </div>

            <!-- Right Visual Banner Card -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="w-full max-w-md bg-secondary rounded-2xl overflow-hidden border border-[#9e6f54] shadow-xl text-white">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop" 
                         alt="Gedung SDN Tunggaljaya 2" 
                         class="w-full h-48 sm:h-64 object-cover">
                    
                    <div class="p-5 sm:p-6 space-y-3">
                        <div class="flex items-center justify-between text-[11px] sm:text-xs text-primary font-bold uppercase">
                            <span><i class="fa-solid fa-location-dot"></i> Sumur, Pandeglang</span>
                            <span><i class="fa-solid fa-shield-check"></i> Terakreditasi B</span>
                        </div>
                        <h3 class="text-base sm:text-lg font-bold text-white">
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

<!-- 2. VISI & MISI SEKOLAH -->
<section id="visimisi" class="py-12 sm:py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Arah & Tujuan</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Visi & Misi Sekolah</h2>
            <p class="text-[#6d4330] text-xs sm:text-sm">Landasan dan dorongan utama kami dalam menyelenggarakan pendidikan di SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
            
            <!-- Visi Card -->
            <div class="lg:col-span-5 bg-secondary text-white rounded-2xl p-5 sm:p-8 border border-[#9e6f54] shadow-xl flex flex-col justify-between space-y-6">
                <div class="space-y-4 sm:space-y-6">
                    <div class="w-12 h-12 rounded-xl bg-primary text-secondary flex items-center justify-center text-xl font-bold shadow">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">Visi Sekolah</h3>
                    <blockquote class="text-sm sm:text-base font-semibold text-primary leading-relaxed italic border-l-4 border-primary pl-4 live-school-vision">
                        "{{ $profile->vision ?? 'Terwujudnya Peserta Didik yang Beriman, Bertaqwa, Berkarakter Luhur, Unggul dalam Prestasi, dan Berwawasan Lingkungan.' }}"
                    </blockquote>
                </div>
                <div class="pt-4 sm:pt-6 text-xs text-primary-200 border-t border-[#9e6f54] font-semibold">
                    <span class="live-school-name">{{ $profile->name ?? 'SD N TUNGGALJAYA 2' }}</span> - Sumur Pandeglang
                </div>
            </div>

            <!-- Misi Card -->
            <div class="lg:col-span-7 bg-secondary text-white rounded-2xl p-5 sm:p-8 border border-[#9e6f54] shadow-xl">
                <div class="flex items-center gap-3.5 sm:gap-4 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-primary text-secondary flex items-center justify-center text-xl font-bold shadow shrink-0">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-white">Misi Sekolah</h3>
                        <p class="text-xs text-primary">Langkah nyata pencapaian visi lembaga</p>
                    </div>
                </div>

                <div class="space-y-3" id="live-mission-container">
                    @if(is_array($profile->mission) && count($profile->mission) > 0)
                        @foreach($profile->mission as $index => $misi)
                            <div class="flex items-start gap-3 p-3.5 sm:p-4 rounded-xl bg-[#9e6f54] border border-[#835841]">
                                <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-primary text-secondary font-extrabold flex items-center justify-center shrink-0 text-xs shadow-xs">
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

<!-- 4. GURU & TENAGA KEPENDIDIKAN -->
<section id="guru" class="py-12 sm:py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Sumber Daya Manusia</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Tenaga Pendidik & Kependidikan</h2>
                <p class="text-[#6d4330] text-xs sm:text-sm mt-1">Guru-guru profesional yang ramah dan berdedikasi tinggi membimbing para siswa.</p>
            </div>
            <div class="self-start md:self-auto text-white text-xs font-bold bg-secondary border border-[#9e6f54] px-3 py-2 rounded-xl shadow-sm">
                <i class="fa-solid fa-users text-primary mr-1"></i> <span class="live-school-teachers">Total {{ count($teachers) }} Tenaga Pendidik</span>
            </div>
        </div>

        <!-- Teachers Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" id="live-teachers-container">
            @foreach($teachers as $teacher)
                <div class="bg-secondary rounded-2xl border border-[#9e6f54] overflow-hidden flex flex-col justify-between shadow-md hover:border-primary transition">
                    <div class="p-5 sm:p-6 text-center space-y-3">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden mx-auto border-4 border-primary shadow-md">
                            <img src="{{ $teacher->photo ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=400&auto=format&fit=crop' }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">{{ $teacher->name }}</h3>
                            <p class="text-xs font-semibold text-primary mt-1">{{ $teacher->position }}</p>
                        </div>
                    </div>
                    <div class="bg-[#9e6f54] px-4 py-2.5 border-t border-[#835841] text-xs text-primary-200 text-center font-mono">
                        <i class="fa-solid fa-id-card text-primary mr-1"></i> NIP: {{ $teacher->nip ?? '-' }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 5. FASILITAS SEKOLAH -->
<section id="fasilitas" class="py-12 sm:py-20 bg-primary border-b border-[#e4bca2] text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Sarana & Prasarana</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Fasilitas Penunjang Belajar</h2>
            <p class="text-[#6d4330] text-xs sm:text-sm">Fasilitas modern yang dirancang untuk mendukung kenyamanan dan proses pembelajaran siswa.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" id="live-facilities-container">
            @foreach($facilities as $facility)
                <div class="bg-secondary text-white rounded-2xl overflow-hidden border border-[#9e6f54] flex flex-col justify-between shadow-md hover:border-primary transition">
                    <div class="relative h-44 sm:h-48 overflow-hidden">
                        <img src="{{ $facility->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $facility->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-secondary p-2 rounded-lg text-primary text-base border border-[#9e6f54] shadow-sm">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 space-y-2">
                        <h3 class="text-base font-bold text-white">{{ $facility->name }}</h3>
                        <p class="text-xs text-primary-100 leading-relaxed">{{ $facility->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 6. BERITA & PENGUMUMAN / PPDB -->
<section id="berita" class="py-12 sm:py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 sm:mb-12 gap-4">
            <div>
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Kabar Terbaru</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Berita, Pengumuman & PPDB</h2>
                <p class="text-[#6d4330] text-xs sm:text-sm mt-1">Dapatkan update seputar kegiatan sekolah, prestasi siswa, dan penerimaan peserta didik baru.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" id="live-posts-container">
            @foreach($latestPosts as $post)
                <article class="bg-secondary rounded-2xl overflow-hidden border border-[#9e6f54] flex flex-col justify-between shadow-md hover:border-primary transition text-white">
                    <div>
                        <div class="relative h-40 sm:h-44 overflow-hidden">
                            <img src="{{ $post->image ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop' }}" 
                                 alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover">
                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-[#3b2116] text-primary font-extrabold text-[11px] sm:text-xs shadow border border-[#6d4330]">
                                {{ $post->category }}
                            </span>
                        </div>
                        <div class="p-4 sm:p-5 space-y-2">
                            <div class="text-xs text-primary font-bold flex items-center gap-1.5">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                            </div>
                            <h3 class="text-sm sm:text-base font-bold text-white hover:text-primary transition leading-snug line-clamp-2">
                                 <a href="{{ route('news.detail', $post->slug, false) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-xs text-primary-100 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5 pt-0">
                        <a href="{{ route('news.detail', $post->slug, false) }}" class="inline-flex items-center gap-2 text-xs font-bold text-primary hover:text-white transition">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>

<!-- 7. GALERI KEGIATAN -->
<section id="galeri" class="py-12 sm:py-20 bg-primary border-b border-[#e4bca2]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-14 space-y-2">
            <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Dokumentasi</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Galeri Kegiatan Sekolah</h2>
            <p class="text-[#6d4330] text-xs sm:text-sm">Momen-momen berharga pembelajaran, karya, dan prestasi siswa SDN Tunggaljaya 2.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6" id="live-gallery-container">
            @foreach($galleries as $gallery)
                <div class="relative group rounded-2xl overflow-hidden aspect-video bg-secondary border border-[#9e6f54] hover:border-primary shadow-md transition">
                    <img src="{{ $gallery->image }}" 
                         alt="{{ $gallery->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition transform duration-300">
                    <div class="absolute inset-0 bg-secondary-950/80 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4 sm:p-5">
                        <span class="text-[10px] sm:text-xs text-primary font-bold uppercase mb-1">{{ $gallery->category }}</span>
                        <h4 class="text-white font-bold text-xs sm:text-sm">{{ $gallery->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 8. KONTAK & LOKASI INTERAKTIF -->
<section id="kontak" class="py-12 sm:py-20 bg-primary text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
            
            <!-- Left Info -->
            <div class="lg:col-span-5 space-y-4 sm:space-y-6">
                <span class="px-3.5 py-1.5 rounded-lg bg-secondary text-white text-[11px] sm:text-xs font-bold uppercase tracking-wider shadow-sm border border-[#9e6f54]">Hubungi Kami</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Lokasi & Sekretariat PPDB</h2>
                <p class="text-[#6d4330] text-xs sm:text-sm leading-relaxed font-medium">
                    Kunjungi langsung kampus SDN Tunggaljaya 2 atau hubungi nomor layanan informasi kami pada jam kerja sekolah.
                </p>

                <div class="space-y-3 sm:space-y-4 pt-2">
                    <div class="flex items-start gap-3.5 sm:gap-4 p-3.5 sm:p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-base sm:text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-white">Alamat Lengkap</h4>
                            <p class="text-xs text-primary-100 mt-0.5 leading-relaxed live-school-address">{{ $profile->address }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 sm:gap-4 p-3.5 sm:p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-base sm:text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-white">Telepon / WhatsApp</h4>
                            <p class="text-xs text-primary-100 mt-0.5 live-school-phone">{{ $profile->phone }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 sm:gap-4 p-3.5 sm:p-4 rounded-xl bg-secondary text-white border border-[#9e6f54] shadow-md">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-lg bg-[#9e6f54] text-primary flex items-center justify-center font-bold text-base sm:text-lg shrink-0 shadow border border-[#835841]">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="text-xs sm:text-sm font-bold text-white">Email Resmi</h4>
                            <p class="text-xs text-primary-100 mt-0.5 live-school-email">{{ $profile->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Map Embed -->
            <div class="lg:col-span-7">
                <div class="bg-secondary p-2.5 sm:p-3 rounded-2xl border border-[#9e6f54] shadow-xl">
                    <iframe src="{{ $profile->map_url ?? 'https://maps.google.com/maps?q=Sumur+Pandeglang&t=&z=13&ie=UTF8&iwloc=&output=embed' }}" 
                            class="w-full h-64 sm:h-96 rounded-xl border-0 live-map-iframe" 
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
