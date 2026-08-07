<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Operator - SDN Tunggaljaya 2')</title>

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
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between shrink-0 hidden md:flex border-r border-slate-800">
        <div>
            <!-- Brand -->
            <div class="h-20 flex items-center gap-3 px-6 bg-slate-950 border-b border-slate-800">
                <div class="w-10 h-10 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center font-bold text-xl shadow-lg">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div>
                    <div class="text-sm font-extrabold text-white tracking-tight">PANEL OPERATOR</div>
                    <div class="text-[11px] text-amber-400 font-semibold">SDN Tunggaljaya 2</div>
                </div>
            </div>

            <!-- Role Badge -->
            <div class="p-4 border-b border-slate-800/60">
                <div class="bg-slate-800/80 p-3 rounded-xl border border-slate-700 text-xs space-y-1">
                    <div class="text-slate-400 font-medium">Logged in as:</div>
                    <div class="text-white font-bold truncate">{{ auth()->user()->name ?? 'Operator' }}</div>
                    <div class="text-[10px] text-emerald-400 font-bold tracking-wider uppercase"><i class="fa-solid fa-shield-halved"></i> Role: OPERATOR</div>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-sm font-medium">
                <a href="{{ route('operator.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.dashboard') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-gauge text-base w-5 text-center"></i> Dashboard
                </a>

                <a href="{{ route('operator.profile') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.profile') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-school-flag text-base w-5 text-center"></i> Profil Sekolah
                </a>

                <a href="{{ route('operator.teachers') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.teachers') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-chalkboard-user text-base w-5 text-center"></i> Guru & Staf
                </a>

                <a href="{{ route('operator.facilities') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.facilities') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-building-user text-base w-5 text-center"></i> Fasilitas
                </a>

                <a href="{{ route('operator.posts') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.posts') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-newspaper text-base w-5 text-center"></i> Berita & PPDB
                </a>

                <a href="{{ route('operator.gallery') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('operator.gallery') ? 'bg-amber-500 text-slate-950 font-bold shadow-md' : 'hover:bg-slate-800 text-slate-300' }}">
                    <i class="fa-solid fa-images text-base w-5 text-center"></i> Galeri Foto
                </a>
            </nav>
        </div>

        <!-- Footer Actions -->
        <div class="p-4 border-t border-slate-800 space-y-2">
            <a href="{{ route('home') }}" target="_blank" class="w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-amber-400 text-xs font-bold transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-eye"></i> Liha Tampilan Tamu (Guest)
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
        
        <!-- TOPBAR -->
        <header class="h-20 bg-white border-b border-slate-200 px-6 flex items-center justify-between shadow-sm">
            <div>
                <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">@yield('header_title', 'Dashboard Operator')</h1>
                <p class="text-xs text-slate-500">Kelola informasi publik dan profil SDN Tunggaljaya 2</p>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-amber-500 hover:text-slate-950 text-slate-700 text-xs font-bold transition flex items-center gap-2 border border-slate-200">
                    <i class="fa-solid fa-globe"></i> View Website
                </a>
            </div>
        </header>

        <!-- FLASH MESSAGES -->
        @if(session('success'))
            <div class="mx-6 mt-6">
                <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-700 px-4 py-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mx-6 mt-6">
                <div class="bg-rose-500/10 border border-rose-500/30 text-rose-700 px-4 py-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-triangle-exclamation text-rose-500 text-lg"></i>
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
