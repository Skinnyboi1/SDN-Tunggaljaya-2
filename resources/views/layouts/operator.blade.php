<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Operator - SDN Tunggaljaya 2')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts -->
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
</head>
<body class="bg-primary text-slate-800 font-sans antialiased flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#3b2116] text-[#f5e5da] flex flex-col justify-between shrink-0 hidden md:flex border-r border-[#6d4330]">
        <div>
            <!-- Brand with Logo on Placeholder -->
            <div class="h-20 flex items-center gap-3 px-6 bg-[#2a170f] border-b border-[#6d4330]">
                <div class="w-10 h-10 rounded-xl bg-secondary flex items-center justify-center p-1 shadow-lg border border-secondary-600">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Tunggaljaya 2" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="text-sm font-extrabold text-white tracking-tight">PANEL OPERATOR</div>
                    <div class="text-[11px] text-primary font-semibold">SDN Tunggaljaya 2</div>
                </div>
            </div>



            <!-- Role Badge -->
            <div class="p-4 border-b border-[#6d4330]/60">
                <div class="bg-[#2a170f] p-3 rounded-xl border border-[#6d4330] text-xs space-y-1">
                    <div class="text-[#d49e7b] font-medium">Logged in as:</div>
                    <div class="text-white font-bold truncate">{{ auth()->user()->name ?? 'Operator' }}</div>
                    <div class="text-[10px] text-primary font-bold tracking-wider uppercase"><i class="fa-solid fa-shield-halved text-secondary"></i> Role: OPERATOR</div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm font-medium">
                <a href="{{ route('operator.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.dashboard') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-gauge text-base w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('operator.profile') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.profile') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-school-flag text-base w-5 text-center"></i> Profil Sekolah
                </a>

                <a href="{{ route('operator.teachers') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.teachers') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-chalkboard-user text-base w-5 text-center"></i> Guru & Staf
                </a>

                <a href="{{ route('operator.facilities') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.facilities') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-building-user text-base w-5 text-center"></i> Fasilitas
                </a>

                <a href="{{ route('operator.posts') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.posts') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-newspaper text-base w-5 text-center"></i> Berita & PPDB
                </a>

                <a href="{{ route('operator.gallery') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.gallery') ? 'bg-secondary text-white font-bold shadow-md' : 'hover:bg-[#6d4330]/40 hover:text-primary text-[#f5e5da]' }}">
                    <i class="fa-solid fa-images text-base w-5 text-center"></i> Galeri Foto
                </a>
            </nav>
        </div>

        <!-- Footer Actions -->
        <div class="p-4 border-t border-[#6d4330] space-y-2">
            <a href="{{ route('home') }}" target="_blank" class="w-full py-2.5 px-4 rounded-xl bg-[#2a170f] hover:bg-[#6d4330] text-primary text-xs font-bold transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-eye text-secondary"></i> Lihat Tampilan Tamu (Guest)
            </a>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-rose-500/20 hover:bg-rose-500 text-rose-300 hover:text-white text-xs font-bold transition flex items-center justify-center gap-2 border border-rose-500/30">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar / Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="flex-grow flex flex-col min-w-0">
        
        <!-- TOPBAR (CHANGED TO #b68a70) -->
        <header class="h-20 bg-secondary border-b border-[#9e6f54] px-6 flex items-center justify-between shadow-md text-white">
            <div>
                <h1 class="text-xl font-extrabold text-white tracking-tight">@yield('header_title', 'Dashboard Operator')</h1>
                <p class="text-xs text-primary">Kelola informasi publik dan profil SDN Tunggaljaya 2</p>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 rounded-xl bg-[#3b2116] hover:bg-[#2a170f] text-primary text-xs font-bold transition flex items-center gap-2 border border-[#6d4330] shadow-sm">
                    <i class="fa-solid fa-globe text-secondary"></i> View Website
                </a>
            </div>
        </header>

        <!-- FLASH MESSAGES -->
        @if(session('success'))
            <div class="mx-6 mt-6">
                <div class="bg-emerald-600 border border-emerald-500 text-white px-4 py-3 rounded-xl flex items-center gap-2 shadow-md">
                    <i class="fa-solid fa-circle-check text-white text-lg"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mx-6 mt-6">
                <div class="bg-rose-600 border border-rose-500 text-white px-4 py-3 rounded-xl flex items-center gap-2 shadow-md">
                    <i class="fa-solid fa-triangle-exclamation text-white text-lg"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        <!-- PAGE CONTENT -->
        <main class="p-6 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>




