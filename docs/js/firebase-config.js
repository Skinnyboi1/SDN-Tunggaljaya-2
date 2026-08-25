// Firebase v10 SDK Modules (100% Free Spark Plan - No Blaze Plan Needed)
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.0/firebase-analytics.js";
import { 
    getAuth, 
    signInWithEmailAndPassword, 
    signOut, 
    onAuthStateChanged,
    GoogleAuthProvider,
    signInWithPopup
} from "https://www.gstatic.com/firebasejs/10.12.0/firebase-auth.js";
import { 
    getFirestore, 
    collection, 
    doc, 
    getDoc, 
    getDocs, 
    setDoc, 
    addDoc, 
    updateDoc, 
    deleteDoc, 
    query, 
    orderBy, 
    where, 
    onSnapshot,
    serverTimestamp 
} from "https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore.js";

// Firebase Project Credentials
export const firebaseConfig = {
    apiKey: "AIzaSyA7hj_pon3B4Ovf_c6zVeaPEpUCxaUhnms",
    authDomain: "sdn-tunggaljaya-2-390e2.firebaseapp.com",
    projectId: "sdn-tunggaljaya-2-390e2",
    storageBucket: "sdn-tunggaljaya-2-390e2.firebasestorage.app",
    messagingSenderId: "98855346649",
    appId: "1:98855346649:web:6b0953e2ac9aaaef5fb9c8",
    measurementId: "G-W664X67YSR"
};

// Initialize Free Firebase Services (Auth & Firestore)
export const app = initializeApp(firebaseConfig);
export const analytics = typeof window !== 'undefined' ? getAnalytics(app) : null;
export const auth = getAuth(app);
export const db = getFirestore(app);

// Export Firebase Auth & Firestore Functions
export {
    signInWithEmailAndPassword,
    signOut,
    onAuthStateChanged,
    GoogleAuthProvider,
    signInWithPopup,
    collection,
    doc,
    getDoc,
    getDocs,
    setDoc,
    addDoc,
    updateDoc,
    deleteDoc,
    query,
    orderBy,
    where,
    onSnapshot,
    serverTimestamp
};

/**
 * Client-Side Smart Image Compressor
 * Automatically resizes & compresses any uploaded image (even 10MB+ phone photos)
 * into lightweight, crystal-clear Data URLs (approx 40KB - 70KB).
 * Stored directly in Firestore - 100% FREE without Firebase Storage / Blaze Plan!
 */
export async function uploadImageFile(file, maxWidth = 1000, quality = 0.8) {
    if (!file) return null;

    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = (readerEvent) => {
            const img = new Image();
            img.onload = () => {
                let width = img.width;
                let height = img.height;

                // Resize down if larger than maxWidth
                if (width > maxWidth || height > maxWidth) {
                    if (width > height) {
                        height = Math.round((height * maxWidth) / width);
                        width = maxWidth;
                    } else {
                        width = Math.round((width * maxWidth) / height);
                        height = maxWidth;
                    }
                }

                const canvas = document.createElement('canvas');
                canvas.width = width;
                canvas.height = height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, width, height);

                // Export as compressed JPEG Data URL
                const compressedDataUrl = canvas.toDataURL('image/jpeg', quality);
                resolve(compressedDataUrl);
            };
            img.onerror = (err) => reject(err);
            img.src = readerEvent.target.result;
        };
        reader.onerror = (err) => reject(err);
        reader.readAsDataURL(file);
    });
}

/**
 * Default Seed Data (Initial state matching existing school profile)
 */
export const DEFAULT_SCHOOL_DATA = {
    profile: {
        name: "SD N TUNGGALJAYA 2",
        npsn: "20600476",
        akreditasi: "B",
        history: "SD N TUNGGALJAYA 2 berlokasi di Kecamatan Sumur, Kabupaten Pandeglang, Banten. Berdiri sebagai garda terdepan pendidikan dasar yang melayani generasi muda di wilayah pesisir barat Pandeglang dengan semangat kekeluargaan dan prestasi.",
        vision: "Terwujudnya Peserta Didik yang Beriman, Bertaqwa, Berkarakter Luhur, Unggul dalam Prestasi, dan Berwawasan Lingkungan.",
        mission: [
            "Menyelenggarakan pembelajaran berorientasi pada pengembangan karakter Islami dan budi pekerti luhur.",
            "Mengembangkan pembelajaran aktif, kreatif, efektif, dan menyenangkan berbasis teknologi digital.",
            "Menumbuhkan semangat berprestasi dalam bidang akademik, seni, dan olahraga bagi seluruh warga sekolah.",
            "Menciptakan lingkungan sekolah yang bersih, hijau, sehat, dan kondusif untuk tumbuh kembang anak."
        ],
        student_count: 185,
        teacher_count: 12,
        class_count: 6,
        address: "Jl. Taman Nasional Ujung Kulon, Desa Tunggaljaya, Kec. Sumur, Kab. Pandeglang, Banten 42283",
        phone: "+62 812-3456-7890",
        email: "sdntunggaljaya2@gmail.com",
        map_url: "https://maps.google.com/maps?q=Sumur+Pandeglang&t=&z=13&ie=UTF8&iwloc=&output=embed"
    },
    teachers: [
        { name: "ADE SUMARNA, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/ADE%20SUMARNA,%20S.Pd.jpeg", order: 1 },
        { name: "ALIMUDIN, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/ALIMUDIN,%20S.Pd.jpeg", order: 2 },
        { name: "ANIS KHUATUL SRI RAHAYU, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/ANIS%20KHUATUL%20SRI%20RAHAYU,%20S.Pd.jpeg", order: 3 },
        { name: "ENCEP IR, S.S.", nip: "-", position: "Guru Bahasa", photo: "./uploads/teachers/ENCEP%20IR,%20S.S.jpeg", order: 4 },
        { name: "EROH HERNAWATI, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/EROH%20HERNAWATI,%20S.Pd.jpeg", order: 5 },
        { name: "FITRIA FEBRIYANTI, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/FITRIA%20FEBRIYANTI,%20S.Pd.jpeg", order: 6 },
        { name: "IDA ROSIDA, S.Pd.I.", nip: "-", position: "Guru PAI", photo: "./uploads/teachers/IDA%20ROSIDA,%20S.Pd.I.jpeg", order: 7 },
        { name: "RISMA RISDIYANTI, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/RISMA%20RISDIYANTI,%20S.Pd.jpeg", order: 8 },
        { name: "SACHRUDIYANTO, S.Pd.", nip: "-", position: "Guru PJOK", photo: "./uploads/teachers/SACHRUDIYANTO,%20S.Pd.jpeg", order: 9 },
        { name: "SAEFUL ANHAR", nip: "-", position: "Tenaga Administrasi", photo: "./uploads/teachers/SAEFUL%20ANHAR.jpeg", order: 10 },
        { name: "YOGI SAPUTRA PAMUNGKAS, S.Pd.", nip: "-", position: "Guru Kelas", photo: "./uploads/teachers/YOGI%20SAPUTRA%20PAMUNGKAS,%20S.Pd.jpeg", order: 11 },
        { name: "YUNIDAR RIFA'ATUL MUKARROMAH, S.E.", nip: "-", position: "Bendahara & Staf TU", photo: "./uploads/teachers/YUNIDAR%20RIFA'ATUL%20MUKARROMAH,%20S.E.jpeg", order: 12 }
    ],
    facilities: [
        { name: "Laboratorium Komputer & TIK", description: "Fasilitas perangkat komputer terkoneksi internet untuk pelatihan digital dan ANBK siswa.", image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop", icon: "fa-desktop" },
        { name: "Perpustakaan Literasi Cerdas", description: "Koleksi buku cerita, ensiklopedia, dan buku pelajaran yang lengkap serta ruang baca yang nyaman.", image: "https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=600&auto=format&fit=crop", icon: "fa-book-open-reader" },
        { name: "Ruang Kelas Multimedia", description: "Ruang kelas dilengkapi proyektor LCD dan audio interaktif untuk proses belajar mengajar.", image: "https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop", icon: "fa-chalkboard" },
        { name: "Lapangan Olahraga Serbaguna", description: "Area olahraga untuk kegiatan upacara bendera, senam bersama, futsal, voli, dan bulutangkis.", image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=600&auto=format&fit=crop", icon: "fa-futbol" },
        { name: "Kantin Sehat & Higenis", description: "Menyediakan makanan dan minuman sehat yang bersih dan terawasi untuk seluruh warga sekolah.", image: "https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=600&auto=format&fit=crop", icon: "fa-utensils" },
        { name: "Ruang UKS & Konseling", description: "Fasilitas pertolongan pertama pada kecelakaan/kesehatan serta konsultasi bimbingan siswa.", image: "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=600&auto=format&fit=crop", icon: "fa-heart-pulse" }
    ],
    posts: [
        {
            title: "Penerimaan Peserta Didik Baru (PPDB) SDN Tunggaljaya 2 Tahun Ajaran 2026/2027",
            slug: "penerimaan-peserta-didik-baru-ppdb-sdn-tunggaljaya-2-2026-2027",
            category: "Pengumuman",
            excerpt: "SDN Tunggaljaya 2 resmi membuka pendaftaran peserta didik baru (PPDB) untuk tahun ajaran 2026/2027. Simak syarat dan tata cara pendaftarannya di sini.",
            content: "<p>SDN Tunggaljaya 2 resmi membuka <strong>Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027</strong>. Pendaftaran dapat dilakukan secara online melalui website ini atau langsung datang ke sekretariat PPDB sekolah.</p><h3>Persyaratan Pendaftaran:</h3><ul><li>Akte Kelahiran (Fotokopi)</li><li>Kartu Keluarga / KK (Fotokopi)</li><li>Pasfoto Ukuran 3x4 (3 Lembar)</li><li>Usia Minimal 6 Tahun per 1 Juli 2026</li></ul><p>Mari bergabung menjadi bagian dari keluarga besar SDN Tunggaljaya 2!</p>",
            image: "https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop",
            is_published: true,
            published_at: "2026-08-22 21:36:00"
        },
        {
            title: "Tim Pramuka SDN Tunggaljaya 2 Meraih Juara Umum Lomba Regu Tingkat Kabupaten",
            slug: "tim-pramuka-sdn-tunggaljaya-2-meraih-juara-umum-lomba-regu",
            category: "Prestasi",
            excerpt: "Prestasi membanggakan kembali diraih oleh kontingen Pramuka Penggalang SDN Tunggaljaya 2 dalam ajang Jambore dan Lomba Regu Prestasi.",
            content: "<p>Alhamdulillah, puji syukur kepada Tuhan Yang Maha Esa, regu Pramuka Penggalang SDN Tunggaljaya 2 berhasil menorehkan prestasi gemilang dengan meraih gelar <strong>Juara Umum</strong> pada ajang Lomba Tingkat Regu Pramuka tingkat Kabupaten Pandeglang.</p><p>Kepala Sekolah menyampaikan apresiasi setinggi-tingginya kepada seluruh pembina, pelatih, serta siswa-siswi yang telah berjuang dengan penuh kedisiplinan dan sportivitas.</p>",
            image: "https://images.unsplash.com/photo-1526976668912-1a811878dd37?q=80&w=800&auto=format&fit=crop",
            is_published: true,
            published_at: "2026-08-20 14:15:00"
        },
        {
            title: "Peluncuran Program Literasi Digital & Extrakulikuler Coding untuk Kelas IV-VI",
            slug: "peluncuran-program-literasi-digital-extrakulikuler-coding",
            category: "Berita",
            excerpt: "Mempersiapkan siswa menghadapi era teknologi dengan program pengenalan dasar komputer dan logika pemrograman visual.",
            content: "<p>SDN Tunggaljaya 2 resmi meluncurkan kegiatan ekstrakulikuler baru yaitu <strong>Literasi Digital & Pengenalan Logika Coding Dasar</strong> yang ditujukan bagi siswa kelas IV, V, dan VI.</p><p>Program ini memanfaatkan fasilitas laboratorium komputer sekolah untuk melatih anak berpikir komputasional, kreatif, dan cerdas dalam memanfaatkan teknologi informasi secara positif.</p>",
            image: "https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop",
            is_published: true,
            published_at: "2026-08-18 10:00:00"
        }
    ],
    gallery: [
        { title: "Kegiatan Upacara Bendera Hari Senin", category: "Kegiatan", image: "https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=600&auto=format&fit=crop" },
        { title: "Praktek Sains di Laboratorium Komputer", category: "Fasilitas", image: "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop" },
        { title: "Latihan Rutin Pramuka Penggalang", category: "Kegiatan", image: "https://images.unsplash.com/photo-1526976668912-1a811878dd37?q=80&w=600&auto=format&fit=crop" },
        { title: "Pentas Seni & Kreasi Siswa Akhir Tahun", category: "Prestasi", image: "https://images.unsplash.com/photo-1460518451285-97b6aa326961?q=80&w=600&auto=format&fit=crop" },
        { title: "Lomba Olahraga Sepakbola Antar Kelas", category: "Kegiatan", image: "https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=600&auto=format&fit=crop" },
        { title: "Kerja Bakti Lingkungan Sekolah Hijau", category: "Kegiatan", image: "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=600&auto=format&fit=crop" }
    ]
};
