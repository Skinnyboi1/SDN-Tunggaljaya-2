<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Operator - SDN Tunggaljaya 2</title>

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
<body class="bg-primary text-slate-900 font-sans antialiased min-h-screen flex items-center justify-center p-3.5 sm:p-4">

    <div class="w-full max-w-md bg-secondary text-white rounded-3xl border border-[#9e6f54] shadow-2xl p-5 sm:p-8 space-y-5 sm:space-y-6">
        
        <!-- Header with Logo on Placeholder -->
        <div class="text-center space-y-2">
            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-primary flex items-center justify-center p-2 mx-auto shadow-md border border-primary-200">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SDN Tunggaljaya 2" class="w-full h-full object-contain">
            </div>
            <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">Login Operator</h1>
            <p class="text-xs text-primary">Masuk untuk mengelola data & profil SDN Tunggaljaya 2</p>
        </div>

        <!-- Quick Demo Account Hint Card -->
        <div class="bg-[#9e6f54] border border-[#835841] p-3 sm:p-3.5 rounded-2xl text-xs text-white space-y-1">
            <div class="font-bold text-primary flex items-center gap-1.5">
                <i class="fa-solid fa-key"></i> Akun Akreditasi / Operator Demo:
            </div>
            <div class="font-mono text-[11px] text-[#fdfbf9] break-all">
                Email: <strong class="text-white">operator@tunggaljaya2.sch.id</strong><br>
                Password: <strong class="text-white">password123</strong>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-rose-600 border border-rose-500 text-white text-xs p-3 rounded-xl">
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
                <label class="block text-xs font-bold text-primary mb-1.5">Alamat Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-primary-200 pointer-events-none">
                        <i class="fa-solid fa-envelope text-sm"></i>
                    </span>
                    <input type="email" name="email" value="{{ old('email', 'operator@tunggaljaya2.sch.id') }}" required 
                           class="w-full pl-10 pr-4 py-3 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1.5">Kata Sandi (Password)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-primary-200 pointer-events-none">
                        <i class="fa-solid fa-key text-sm"></i>
                    </span>
                    <input type="password" name="password" value="password123" required 
                           class="w-full pl-10 pr-4 py-3 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs text-primary-100 font-semibold">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-[#9e6f54] border-[#835841] text-primary focus:ring-0">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-primary hover:bg-primary-200 text-slate-950 font-extrabold text-sm shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 active:scale-95">
                <i class="fa-solid fa-right-to-bracket text-secondary"></i> Masuk Sekarang
            </button>
        </form>

        <div class="pt-2 text-center border-t border-[#9e6f54]">
            <a href="{{ route('home') }}" class="text-xs text-primary hover:text-white font-bold transition flex items-center justify-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Halaman Utama Guest
            </a>
        </div>

    </div>

</body>
</html>



