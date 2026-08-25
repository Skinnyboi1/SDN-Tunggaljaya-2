# Panduan Lengkap: Full Firebase Serverless (Opsi B)
## SD N TUNGGALJAYA 2

Website SDN Tunggaljaya 2 kini telah dimigrasi secara penuh ke arsitektur **Full Firebase Serverless**. Seluruh aplikasi (website publik, login operator, panel kelola konten, database, dan upload gambar) berjalan secara online di Google Firebase Cloud tanpa memerlukan server PHP atau Laragon lokal.

---

### 1. Akses Website & Panel Operator

| Halaman | URL Firebase Hosting | Keterangan |
| :--- | :--- | :--- |
| **Website Publik** | `https://sdn-tunggaljaya-2-390e2.web.app` | Profil, Guru, Fasilitas, Berita, Galeri |
| **Login Operator** | `https://sdn-tunggaljaya-2-390e2.web.app/login` | Login Email/Password & Google |
| **Panel Operator** | `https://sdn-tunggaljaya-2-390e2.web.app/operator` | Kelola Konten & Sinkronisasi Data |
| **Pusat Berita** | `https://sdn-tunggaljaya-2-390e2.web.app/berita` | Daftar Berita & Detail Artikel |

---

### 2. Cara Mengaktifkan Layanan di Firebase Console (Hanya Sekali)

Buka [Firebase Console](https://console.firebase.google.com/project/sdn-tunggaljaya-2-390e2):

1. **Authentication (Login Operator):**
   - Menu **Build** &rarr; **Authentication** &rarr; **Get Started**.
   - Tab **Sign-in method** &rarr; Aktifkan **Email/Password** dan **Google**.
   - Tab **Users** &rarr; Klik **Add user**, buat akun operator (contoh: `operator@tunggaljaya2.sch.id` & password).

2. **Cloud Firestore (Database):**
   - Menu **Build** &rarr; **Firestore Database** &rarr; **Create database**.
   - Pilih lokasi: `asia-southeast2` (Jakarta) atau `asia-southeast1` (Singapura).
   - Mode: *Production Mode*.

3. **Cloud Storage (Upload Foto):**
   - Menu **Build** &rarr; **Storage** &rarr; **Get Started**.

---

### 3. Sinkronisasi Data Awal ke Firestore (One-Click)

Setelah membuat database Firestore di Firebase Console:
1. Buka `https://sdn-tunggaljaya-2-390e2.web.app/login` (atau buka `dist/login.html` di browser).
2. Login menggunakan akun operator yang sudah didaftarkan.
3. Di halaman Dashboard Operator, klik tombol **"🚀 Sinkronkan Data Awal"**.
4. Seluruh data identitas sekolah, 12 guru lengkap dengan foto, fasilitas, berita PPDB, dan galeri akan langsung otomatis terisi ke Cloud Firestore dalam 2 detik!

---

### 4. Perintah Deploy ke Firebase

Jalankan perintah berikut di terminal:

```cmd
# 1. Login ke akun Google Firebase (hanya sekali)
npx firebase-tools login

# 2. Deploy hosting, rules database, dan rules storage
npx firebase-tools deploy
```

Atau jika hanya ingin mengupdate file hosting:
```cmd
npx firebase-tools deploy --only hosting
```
