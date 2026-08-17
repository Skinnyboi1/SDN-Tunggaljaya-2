<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDN Tunggaljaya 2 - Sekolah Dasar Unggul & Berkarakter')</title>
    <meta name="description" content="Website Resmi SDN Tunggaljaya 2 Sumur Pandeglang Banten. Informasi Profil Sekolah, Visi Misi, Guru & Staf, Fasilitas, Berita, PPDB dan Galeri Kegiatan.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

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
    <div class="bg-[#9e6f54] text-[#fdfbf9] text-xs py-2.5 px-4 border-b border-[#835841]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4 font-medium">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-graduation-cap text-primary"></i> NPSN: 20215432</span>
                <span class="hidden md:flex items-center gap-1.5"><i class="fa-solid fa-certificate text-primary"></i> Akreditasi: A (Unggul)</span>
                <span class="hidden lg:flex items-center gap-1.5"><i class="fa-solid fa-envelope text-primary/80"></i> info@sdntunggaljaya2.sch.id</span>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-[#835841] text-primary border border-[#6c4837]">
                    <i class="fa-solid fa-user-tag mr-1 text-primary"></i> Role: 
                    @auth
                        <strong class="text-white">{{ strtoupper(auth()->user()->role) }}</strong>
                    @else
                        <strong class="text-white">GUEST (Tamu)</strong>
                    @endauth
                </span>

                @auth
                    @if(auth()->user()->isOperator())
                        <a href="{{ route('operator.dashboard') }}" class="px-3 py-1 rounded-lg bg-primary hover:bg-primary-200 text-[#3b2116] font-extrabold transition flex items-center gap-1 shadow-sm">
                            <i class="fa-solid fa-gauge"></i> Panel Operator
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-200 transition ml-2 font-bold text-white">
                            <i class="fa-solid fa-right-from-bracket text-red-200"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-primary font-bold transition flex items-center gap-1">
                        <i class="fa-solid fa-lock text-primary"></i> Login Operator
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (WITH LOGO ON PLACEHOLDER) -->
    <header class="sticky top-0 z-50 flat-nav border-b border-[#9e6f54] shadow-md text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand Name -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-primary flex items-center justify-center p-1 shadow-md border border-primary-200 group-hover:scale-105 transition transform">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Tunggaljaya 2" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="text-lg font-extrabold tracking-tight text-white group-hover:text-primary transition leading-snug">SDN TUNGGALJAYA 2</div>
                        <div class="text-xs text-primary-200 font-medium tracking-wide">Kec. Sumur, Kab. Pandeglang</div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 font-semibold text-sm">
                    <a href="{{ route('home') }}#beranda" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Beranda</a>
                    <a href="{{ route('home') }}#sambutan" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Sambutan</a>
                    <a href="{{ route('home') }}#visimisi" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Visi & Misi</a>
                    <a href="{{ route('home') }}#guru" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Guru & Staf</a>
                    <a href="{{ route('home') }}#fasilitas" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Fasilitas</a>
                    <a href="{{ route('home') }}#berita" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Berita</a>
                    <a href="{{ route('home') }}#galeri" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Galeri</a>
                    <a href="{{ route('home') }}#kontak" class="px-3 py-2 rounded-lg text-white/90 hover:text-white hover:bg-[#9e6f54] transition">Kontak</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 rounded-lg bg-[#9e6f54] text-white hover:bg-[#835841] focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-[#b68a70] border-b border-[#835841] px-4 pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}#beranda" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Beranda</a>
            <a href="{{ route('home') }}#sambutan" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Sambutan</a>
            <a href="{{ route('home') }}#visimisi" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Visi & Misi</a>
            <a href="{{ route('home') }}#guru" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Guru & Staf</a>
            <a href="{{ route('home') }}#fasilitas" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Fasilitas</a>
            <a href="{{ route('home') }}#berita" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Berita</a>
            <a href="{{ route('home') }}#galeri" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Galeri</a>
            <a href="{{ route('home') }}#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-[#9e6f54]">Kontak</a>
        </div>
    </header>

    <!-- CONTENT ALERTS -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-emerald-600 border border-emerald-500 text-white px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-white text-lg"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-rose-600 border border-rose-500 text-white px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-white text-lg"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- MAIN BODY SECTION -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#3b2116] text-[#f5e5da] pt-16 pb-8 border-t border-[#6d4330] mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Col 1: About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-primary p-0.5 flex items-center justify-center shadow">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Tunggaljaya 2" class="w-full h-full object-contain">
                        </div>
                        <span class="text-white font-extrabold text-lg">SDN Tunggaljaya 2</span>
                    </div>
                    <p class="text-xs text-[#f4d8cc] leading-relaxed mb-4">
                        Sekolah Dasar Negeri dengan komitmen membina generasi cerdas, berkarakter mulia, bernalar kritis, dan berwawasan teknologi masa depan.
                    </p>
                </div>



                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-secondary pl-3">Tautan Cepat</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#visimisi" class="hover:text-primary transition"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Visi & Misi</a></li>
                        <li><a href="#guru" class="hover:text-primary transition"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Tenaga Pendidik</a></li>
                        <li><a href="#fasilitas" class="hover:text-primary transition"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Fasilitas Sekolah</a></li>
                        <li><a href="#berita" class="hover:text-primary transition"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Berita & PPDB</a></li>
                        <li><a href="#galeri" class="hover:text-primary transition"><i class="fa-solid fa-chevron-right text-[10px] text-secondary mr-2"></i>Galeri Foto</a></li>
                    </ul>
                </div>

                <!-- Col 3: Role Info -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-secondary pl-3">Akses Sistem</h3>
                    <div class="bg-[#2a170f] p-4 rounded-xl border border-[#6d4330] text-xs leading-relaxed space-y-2.5">
                        <div class="flex items-center gap-2 text-[#f5e5da]">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                            <strong>Role Guest:</strong> Akses penuh profil & pengumuman.
                        </div>
                        <div class="flex items-center gap-2 text-[#f5e5da]">
                            <span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
                            <strong>Role Operator:</strong> Panel kelola konten.
                        </div>
                        <div class="pt-1">
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-primary font-bold hover:text-secondary-300 hover:underline">
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
                            <i class="fa-solid fa-location-dot text-secondary mt-0.5"></i>
                            <span>Jl. Pendidikan No. 42, Tunggaljaya, Sumur, Pandeglang</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-secondary"></i>
                            <span>(0253) 8812-901</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-secondary"></i>
                            <span>info@sdntunggaljaya2.sch.id</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 border-t border-[#6d4330] text-center text-xs text-[#d49e7b]">
                <p>&copy; {{ date('Y') }} SDN Tunggaljaya 2. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn?.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

