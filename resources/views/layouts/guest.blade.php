<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDN Tunggaljaya 2 - Sekolah Dasar Unggul & Berkarakter')</title>
    <meta name="description" content="Website Resmi SDN Tunggaljaya 2 Sumur Pandeglang Banten. Informasi Profil Sekolah, Visi Misi, Guru & Staf, Fasilitas, Berita, PPDB dan Galeri Kegiatan.">
    
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
                        amber: {
                            400: '#fbbf24',
                            500: '#f59e0b',
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
            background-color: #0b0f19;
            color: #f8fafc;
        }
        .flat-nav {
            background-color: #0f172a;
        }
        .card-flat {
            background-color: #1e293b;
            border: 1px solid #334155;
        }
        .card-flat-hover {
            transition: all 0.2s ease-in-out;
        }
        .card-flat-hover:hover {
            border-color: #fbbf24;
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased flex flex-col min-h-screen">

    <!-- TOP BAR INFO & ROLE SWITCHER -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2.5 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-graduation-cap text-amber-400"></i> NPSN: 20215432</span>
                <span class="hidden md:flex items-center gap-1.5"><i class="fa-solid fa-certificate text-emerald-400"></i> Akreditasi: A (Unggul)</span>
                <span class="hidden lg:flex items-center gap-1.5"><i class="fa-solid fa-envelope text-slate-400"></i> info@sdntunggaljaya2.sch.id</span>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-0.5 rounded text-[11px] font-bold bg-slate-800 text-emerald-400 border border-slate-700">
                    <i class="fa-solid fa-user-tag mr-1"></i> Role: 
                    @auth
                        <strong class="text-amber-400">{{ strtoupper(auth()->user()->role) }}</strong>
                    @else
                        <strong class="text-emerald-400">GUEST (Tamu)</strong>
                    @endauth
                </span>

                @auth
                    @if(auth()->user()->isOperator())
                        <a href="{{ route('operator.dashboard') }}" class="px-3 py-1 rounded bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold transition flex items-center gap-1">
                            <i class="fa-solid fa-gauge"></i> Panel Operator
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-red-400 transition ml-2 font-bold">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-amber-400 font-bold transition flex items-center gap-1">
                        <i class="fa-solid fa-lock text-amber-400"></i> Login Operator
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <header class="sticky top-0 z-50 flat-nav border-b border-slate-800 shadow-xl text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo & Brand Name -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-amber-500 flex items-center justify-center text-slate-950 font-extrabold text-xl shadow">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <div>
                        <div class="text-lg font-extrabold tracking-tight text-white group-hover:text-amber-400 transition">SDN TUNGGALJAYA 2</div>
                        <div class="text-xs text-slate-400 font-medium tracking-wide">Kec. Sumur, Kab. Pandeglang</div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex items-center gap-1 font-semibold text-sm">
                    <a href="{{ route('home') }}#beranda" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Beranda</a>
                    <a href="{{ route('home') }}#sambutan" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Sambutan</a>
                    <a href="{{ route('home') }}#visimisi" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Visi & Misi</a>
                    <a href="{{ route('home') }}#guru" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Guru & Staf</a>
                    <a href="{{ route('home') }}#fasilitas" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Fasilitas</a>
                    <a href="{{ route('home') }}#berita" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Berita</a>
                    <a href="{{ route('home') }}#galeri" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Galeri</a>
                    <a href="{{ route('home') }}#kontak" class="px-3 py-2 rounded-lg text-slate-200 hover:text-amber-400 hover:bg-slate-800 transition">Kontak</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="p-2 rounded-lg bg-slate-800 text-slate-300 hover:text-white focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}#beranda" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Beranda</a>
            <a href="{{ route('home') }}#sambutan" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Sambutan</a>
            <a href="{{ route('home') }}#visimisi" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Visi & Misi</a>
            <a href="{{ route('home') }}#guru" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Guru & Staf</a>
            <a href="{{ route('home') }}#fasilitas" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Fasilitas</a>
            <a href="{{ route('home') }}#berita" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Berita</a>
            <a href="{{ route('home') }}#galeri" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Galeri</a>
            <a href="{{ route('home') }}#kontak" class="block px-3 py-2 rounded-md text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">Kontak</a>
        </div>
    </header>

    <!-- CONTENT ALERTS -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-emerald-950 border border-emerald-600 text-emerald-300 px-4 py-3 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-400 text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-rose-950 border border-rose-600 text-rose-300 px-4 py-3 rounded-xl flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-rose-400 text-lg"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- MAIN BODY SECTION -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-8 border-t border-slate-900 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Col 1: About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-amber-500 flex items-center justify-center text-slate-950 font-bold">
                            <i class="fa-solid fa-school text-base"></i>
                        </div>
                        <span class="text-white font-extrabold text-lg">SDN Tunggaljaya 2</span>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed mb-4">
                        Sekolah Dasar Negeri dengan komitmen membina generasi cerdas, berkarakter mulia, bernalar kritis, dan berwawasan teknologi masa depan.
                    </p>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-amber-500 pl-3">Tautan Cepat</h3>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#visimisi" class="hover:text-amber-400 transition"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500 mr-2"></i>Visi & Misi</a></li>
                        <li><a href="#guru" class="hover:text-amber-400 transition"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500 mr-2"></i>Tenaga Pendidik</a></li>
                        <li><a href="#fasilitas" class="hover:text-amber-400 transition"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500 mr-2"></i>Fasilitas Sekolah</a></li>
                        <li><a href="#berita" class="hover:text-amber-400 transition"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500 mr-2"></i>Berita & PPDB</a></li>
                        <li><a href="#galeri" class="hover:text-amber-400 transition"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500 mr-2"></i>Galeri Foto</a></li>
                    </ul>
                </div>

                <!-- Col 3: Role Info -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-emerald-500 pl-3">Akses Sistem</h3>
                    <div class="bg-slate-900 p-4 rounded-xl border border-slate-800 text-xs leading-relaxed space-y-2.5">
                        <div class="flex items-center gap-2 text-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <strong>Role Guest:</strong> Akses penuh profil & pengumuman.
                        </div>
                        <div class="flex items-center gap-2 text-slate-200">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                            <strong>Role Operator:</strong> Panel kelola konten.
                        </div>
                        <div class="pt-1">
                            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-amber-400 font-bold hover:underline">
                                <i class="fa-solid fa-key"></i> Login Operator
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Col 4: Contact -->
                <div>
                    <h3 class="text-white font-bold text-sm mb-4 border-l-4 border-amber-500 pl-3">Alamat & Kontak</h3>
                    <ul class="space-y-2.5 text-xs text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-amber-400 mt-0.5"></i>
                            <span>Jl. Pendidikan No. 42, Tunggaljaya, Sumur, Pandeglang</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-amber-400"></i>
                            <span>(0253) 8812-901</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-amber-400"></i>
                            <span>info@sdntunggaljaya2.sch.id</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 border-t border-slate-900 text-center text-xs text-slate-500">
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
