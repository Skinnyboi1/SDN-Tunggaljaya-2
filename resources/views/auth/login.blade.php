<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Operator - SDN Tunggaljaya 2</title>

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
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-slate-900 rounded-3xl border border-slate-800 shadow-2xl p-8 space-y-6">
        
        <!-- Header -->
        <div class="text-center space-y-2">
            <div class="w-16 h-16 rounded-2xl bg-amber-500 text-slate-950 flex items-center justify-center mx-auto text-2xl font-bold shadow-xl">
                <i class="fa-solid fa-lock"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Login Operator</h1>
            <p class="text-xs text-slate-400">Masuk untuk mengelola data & profil SDN Tunggaljaya 2</p>
        </div>

        <!-- Quick Demo Account Hint Card -->
        <div class="bg-amber-500/10 border border-amber-400/30 p-3.5 rounded-2xl text-xs text-amber-200 space-y-1">
            <div class="font-bold text-amber-400 flex items-center gap-1.5">
                <i class="fa-solid fa-key"></i> Akun Akreditasi / Operator Demo:
            </div>
            <div class="font-mono text-[11px] text-slate-300">
                Email: <strong class="text-amber-300">operator@tunggaljaya2.sch.id</strong><br>
                Password: <strong class="text-amber-300">password123</strong>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs p-3 rounded-xl">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                        <i class="fa-solid fa-envelope text-sm"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'operator@tunggaljaya2.sch.id') }}" required 
                           class="w-full pl-10 pr-4 py-3 bg-slate-800 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-amber-500 transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Kata Sandi (Password)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                        <i class="fa-solid fa-key text-sm"></i>
                    </span>
                    <input type="password" name="password" value="password123" required 
                           class="w-full pl-10 pr-4 py-3 bg-slate-800 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-amber-500 transition">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs text-slate-400">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-slate-800 border-slate-700 text-amber-500 focus:ring-0">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-sm shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk Sekarang
            </button>
        </form>

        <div class="pt-2 text-center border-t border-slate-800">
            <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-amber-400 transition flex items-center justify-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama Guest
            </a>
        </div>

    </div>

</body>
</html>
