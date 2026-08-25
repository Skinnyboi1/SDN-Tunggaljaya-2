<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDN Tunggaljaya 2 - Sekolah Dasar Unggul & Berkarakter')</title>
    <meta name="description" content="Website Resmi SDN Tunggaljaya 2 Sumur Pandeglang Banten. Informasi Profil Sekolah, Visi Misi, Guru & Staf, Fasilitas, Berita, PPDB dan Galeri Kegiatan.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/logo.png">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#f1d7c6',
                            50: '#fdfbf9',
                            100: '#faf4ef',
                            200: '#f5e5da',
                            300: '#f1d7c6',
                            400: '#e4bca2',
                            500: '#d49e7b',
                            600: '#c1815b',
                            700: '#a36544',
                            800: '#845139',
                            900: '#6d4330',
                            950: '#3b2116',
                        },
                        secondary: {
                            DEFAULT: '#b68a70',
                            50: '#fbf8f6',
                            100: '#f5ede7',
                            200: '#ebdcd2',
                            300: '#dcc2b2',
                            400: '#cba58f',
                            500: '#b68a70',
                            600: '#9e6f54',
                            700: '#835841',
                            800: '#6c4837',
                            900: '#593c2e',
                            950: '#311f17',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background-color: #f1d7c6;
            color: #3b2116;
        }
        .flat-nav {
            background-color: #b68a70;
        }
        .card-flat {
            background-color: #b68a70;
            border: 1px solid #9e6f54;
            color: #ffffff;
        }
        .card-flat-hover {
            transition: all 0.2s ease-in-out;
        }
        .card-flat-hover:hover {
            border-color: #f1d7c6;
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="bg-primary text-slate-900 font-sans antialiased flex flex-col min-h-screen">

    <!-- TOP BAR INFO & ROLE SWITCHER -->
    <div class="bg-[#9e6f54] text-[#fdfbf9] text-xs py-2 px-4 border-b border-[#835841]">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-x-4 gap-y-1 font-medium text-[11px] sm:text-xs">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-graduation-cap text-primary"></i> NPSN: 20600476</span>
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-certificate text-primary"></i> Akreditasi: B</span>
                <span class="hidden lg:flex items-center gap-1.5"><i class="fa-solid fa-envelope text-primary/80"></i> sdntunggaljaya2@gmail.com</span>
            </div>
            
            <div class="flex items-center gap-2.5">
                <span class="px-2 py-0.5 rounded text-[10px] sm:text-[11px] font-bold bg-[#835841] text-primary border border-[#6c4837]">
                    <i class="fa-solid fa-user-tag mr-1 text-primary"></i> Role: 
                    @auth
                        <strong class="text-white">{{ strtoupper(auth()->user()->role) }}</strong>
                    @else
                        <strong class="text-white">GUEST</strong>
                    @endauth
                </span>

                @auth
                    @if(auth()->user()->isOperator())
                        <a href="{{ route('operator.dashboard', [], false) }}" class="px-2.5 py-1 rounded-lg bg-primary hover:bg-primary-200 text-[#3b2116] font-extrabold transition flex items-center gap-1 text-[11px] sm:text-xs shadow-sm">
                            <i class="fa-solid fa-gauge"></i> Panel Operator
                        </a>
                    @endif
                    <form action="{{ route('logout', [], false) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-200 transition ml-1 font-bold text-white text-[11px] sm:text-xs">
                            <i class="fa-solid fa-right-from-bracket text-red-200"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login', [], false) }}" class="text-white hover:text-primary font-bold transition flex items-center gap-1 text-[11px] sm:text-xs">
                        <i class="fa-solid fa-lock text-primary"></i> Login Operator
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <header class="sticky top-0 z-50 flat-nav border-b border-[#9e6f54] shadow-md text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                
                <!-- Logo & Brand Name -->
                <a href="{{ route('home', [], false) }}" class="flex items-center gap-2.5 sm:gap-3 group">
                    <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl bg-primary flex items-center justify-center p-1 shadow-md border border-primary-200 group-hover:scale-105 transition transform shrink-0">
                        <img src="/images/logo.png" alt="Logo SD N TUNGGALJAYA 2" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="text-base sm:text-lg font-extrabold tracking-tight text-white group-hover:text-primary transition leading-tight">SD N TUNGGALJAYA 2</div>
                        <div class="text-[10px] sm:text-xs text-primary-200 font-medium tracking-wide">Kec. Sumur, Kab. Pandeglang</div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 font-semibold text-sm">
                    <a href="{{ route('home', [], false) }}#beranda" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Beranda</a>
                    <a href="{{ route('home', [], false) }}#sambutan" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Sambutan</a>
                    <a href="{{ route('home', [], false) }}#visimisi" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Visi & Misi</a>
                    <a href="{{ route('home', [], false) }}#guru" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Guru & Staf</a>
                    <a href="{{ route('home', [], false) }}#fasilitas" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Fasilitas</a>
                    <a href="{{ route('home', [], false) }}#berita" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Berita</a>
                    <a href="{{ route('home', [], false) }}#galeri" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Galeri</a>
                    <a href="{{ route('home', [], false) }}#kontak" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Kontak</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" aria-label="Toggle Navigation Menu" class="p-2 rounded-xl bg-[#9e6f54] text-white hover:bg-[#835841] focus:outline-none border border-[#835841]">
                        <i class="fa-solid fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#b68a70] border-b border-[#835841] px-4 pt-2 pb-4 space-y-1">
            <a href="{{ route('home', [], false) }}#beranda" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Beranda</a>
            <a href="{{ route('home', [], false) }}#sambutan" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Sambutan</a>
            <a href="{{ route('home', [], false) }}#visimisi" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Visi & Misi</a>
            <a href="{{ route('home', [], false) }}#guru" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Guru & Staf</a>
            <a href="{{ route('home', [], false) }}#fasilitas" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Fasilitas</a>
            <a href="{{ route('home', [], false) }}#berita" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Berita</a>
            <a href="{{ route('home', [], false) }}#galeri" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Galeri</a>
            <a href="{{ route('home', [], false) }}#kontak" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-sm font-semibold text-white hover:bg-[#9e6f54] active:bg-[#835841]">Kontak</a>
        </div>
    </header>

    <!-- CONTENT ALERTS -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-emerald-600 border border-emerald-500 text-white px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2 text-xs sm:text-sm">
                    <i class="fa-solid fa-circle-check text-white text-base"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-rose-600 border border-rose-500 text-white px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2 text-xs sm:text-sm">
                    <i class="fa-solid fa-triangle-exclamation text-white text-base"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- MAIN BODY SECTION -->
    <main class="flex-grow min-w-0">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#3b2116] text-[#f5e5da] pt-12 sm:pt-16 pb-8 border-t border-[#6d4330] mt-12 sm:mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 mb-10 sm:mb-12">
                
                <!-- Col 1: About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-primary p-0.5 flex items-center justify-center shadow shrink-0">
                            <img src="/images/logo.png" alt="Logo SD N TUNGGALJAYA 2" class="w-full h-full object-contain">
                        </div>
                        <span class="text-white font-extrabold text-lg">SD N TUNGGALJAYA 2</span>
                    </div>
                    <p class="text-xs text-[#f4d8cc] leading-relaxed mb-4">
                        Sekolah Dasar Negeri dengan komitmen membina generasi cerdas, berkarakter mulia, bernalar kritis, dan berwawasan teknologi masa depan.
                    </p>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-secondary pl-3">Tautan Cepat</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home', [], false) }}#visimisi" class="hover:text-primary transition inline-block py-0.5"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Visi & Misi</a></li>
                        <li><a href="{{ route('home', [], false) }}#guru" class="hover:text-primary transition inline-block py-0.5"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Tenaga Pendidik</a></li>
                        <li><a href="{{ route('home', [], false) }}#fasilitas" class="hover:text-primary transition inline-block py-0.5"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Fasilitas Sekolah</a></li>
                        <li><a href="{{ route('home', [], false) }}#berita" class="hover:text-primary transition inline-block py-0.5"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Berita & PPDB</a></li>
                        <li><a href="{{ route('home', [], false) }}#galeri" class="hover:text-primary transition inline-block py-0.5"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Galeri Foto</a></li>
                    </ul>
                </div>

                <!-- Col 3: Role Info -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-secondary pl-3">Akses Sistem</h3>
                    <div class="bg-[#2a170f] p-4 rounded-xl border border-[#6d4330] text-xs leading-relaxed space-y-2.5">
                        <div class="flex items-center gap-2 text-[#f5e5da]">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary shrink-0"></span>
                            <span><strong>Role Guest:</strong> Akses penuh profil & pengumuman.</span>
                        </div>
                        <div class="flex items-center gap-2 text-[#f5e5da]">
                            <span class="w-2.5 h-2.5 rounded-full bg-secondary shrink-0"></span>
                            <span><strong>Role Operator:</strong> Panel kelola konten.</span>
                        </div>
                        <div class="pt-1">
                            <a href="{{ route('login', [], false) }}" class="inline-flex items-center gap-1.5 text-primary font-bold hover:text-secondary-300 hover:underline">
                                <i class="fa-solid fa-key text-secondary"></i> Login Operator
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 4: Contact -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-secondary pl-3">Alamat & Kontak</h3>
                    <ul class="space-y-2.5 text-xs text-[#f4d8cc]">
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-secondary mt-0.5 shrink-0"></i>
                            <span>Kp. Cipining, Desa Tunggaljaya, Sumur, Pandeglang</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-secondary shrink-0"></i>
                            <span>(0253) 8812-901</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-secondary shrink-0"></i>
                            <span>sdntunggaljaya2@gmail.com</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 border-t border-[#6d4330] text-center text-xs text-[#d49e7b]">
                <p>&copy; {{ date('Y') }} SD N TUNGGALJAYA 2. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

            btn?.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            mobileNavLinks.forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                });
            });
        });
    </script>
</body>
</html>

