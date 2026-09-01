# Panduan Lengkap Setup Backend Supabase
## SD N TUNGGALJAYA 2

Website dan Panel Operator SDN Tunggaljaya 2 kini telah dimigrasikan secara penuh ke **Supabase** (Database PostgreSQL, Supabase Auth, Supabase Storage, dan Supabase Realtime).

---

### 1. Kredensial & Konfigurasi

- **Project URL:** `https://bjnzqebhjkjusdzjavpv.supabase.co`
- **API Key:** Gunakan **Public Anon Key** (Dapat dilihat di Supabase Dashboard &rarr; **Project Settings &rarr; API &rarr; Project API keys &rarr; `anon` `public`**)
- **Storage Bucket:** `school-media` (Publik)

---

### 2. Langkah 1: Jalankan Skrip SQL Database (Hanya Sekali)

Buka dashboard proyek Anda di [Supabase Dashboard](https://supabase.com/dashboard):

1. Masuk ke menu **SQL Editor** (ikon terminal `>_` di sidebar kiri).
2. Klik **New Query**.
3. Buka file [`supabase_schema.sql`](file:///c:/laragon/www/Tunggaljaya/supabase_schema.sql) di project ini, lalu salin (*copy*) seluruh isinya.
4. Tempel (*paste*) ke SQL Editor Supabase, lalu klik tombol **"Run"** (atau tekan `Ctrl + Enter`).
5. Selesai! Semua tabel (`profiles`, `teachers`, `facilities`, `posts`, `gallery`), storage bucket `school-media`, aturan keamanan RLS, dan Realtime Replication akan otomatis dibuat.

---

### 3. Langkah 2: Buat Akun Operator Sekolah

1. Di Supabase Dashboard, buka menu **Authentication** &rarr; **Users**.
2. Klik tombol **"Add user"** &rarr; **"Create user"**.
3. Masukkan:
   - **User Email:** `operator@tunggaljaya2.sch.id` (atau email pilihan Anda).
   - **User Password:** Buat kata sandi yang aman.
   - **Auto Confirm User?**: Centang / Aktifkan (*agar akun langsung aktif tanpa perlu verifikasi email*).
4. Klik **Create User**.

---

### 4. Langkah 3: Masuk ke Panel Operator & Sinkronkan Data

1. Buka halaman login di browser:
   - File lokal: `dist/login.html` (atau `https://sdn-tunggaljaya-2-390e2.web.app/login.html` / domain hosting Anda).
2. Jika Supabase Project URL Anda berbeda, klik **"Set Supabase URL"** di bawah tombol login untuk memasukkan URL proyek Anda.
3. Masukkan email dan kata sandi operator yang telah dibuat di Langkah 2.
4. Di halaman **Dashboard Panel Operator**, klik tombol **"🚀 Muat Data Bawaan Sekarang"** (atau **"Sinkronkan Data Awal"**).
5. Dalam 2 detik, seluruh profil sekolah, data 12 guru lengkap dengan foto, fasilitas, dan berita akan langsung terisi ke database PostgreSQL Supabase Anda!

---

### 5. Fitur-Fitur Panel Operator Supabase:

| Fitur | Deskripsi |
| :--- | :--- |
| **Profil Sekolah** | Edit identitas, NPSN, akreditasi, visi, misi, statistik siswa/guru, alamat, kontak, dan embed Google Maps secara instan. |
| **Guru & Staf** | Tambah, edit urutan, ubah jabatan, dan upload foto guru ke Supabase Storage. |
| **Fasilitas** | Tambah dan kelola foto serta deskripsi fasilitas penunjang sekolah. |
| **Berita & PPDB** | Tulis pengumuman resmi, artikel kegiatan, dan berita PPDB lengkap dengan editor konten. |
| **Galeri Foto** | Upload foto-foto kegiatan siswa yang otomatis tersimpan di bucket Supabase `school-media`. |
| **Real-time Live Sync** | Setiap perubahan di panel operator langsung terpancar secara live ke halaman website utama tanpa reload. |
