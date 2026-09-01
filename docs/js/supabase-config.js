// Supabase JS Client v2 Module (ESM CDN)
import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm";

// Active Supabase Project Credentials
export const DEFAULT_SUPABASE_URL = "https://bjnzqebhjkjusdzjavpv.supabase.co";
export const DEFAULT_SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImJqbnpxZWJoamtqdXNkemphdnB2Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODgyMzA3NDUsImV4cCI6MjEwMzgwNjc0NX0.JtpQmnz1mM4qiks9p5gDLiCXvZ0wFckk2sKGiXL0_0s";

// Initialize Supabase Client
export const supabase = createClient(DEFAULT_SUPABASE_URL, DEFAULT_SUPABASE_KEY, {
    auth: {
        persistSession: true,
        autoRefreshToken: true,
        detectSessionInUrl: true
    }
});

/**
 * Client-Side Smart Image Compressor & Supabase Storage Uploader
 * 1. Resizes & compresses uploaded images (e.g. 10MB camera photo -> 50KB JPEG)
 * 2. Uploads to Supabase Storage bucket 'school-media'
 * 3. Returns the public CDN URL (with Data URL fallback if storage is offline)
 */
export async function uploadImageFile(file, folder = 'general', maxWidth = 1200, quality = 0.82) {
    if (!file) return null;

    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.onload = async (readerEvent) => {
            const img = new Image();
            img.onload = async () => {
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

                // Convert canvas to Blob
                canvas.toBlob(async (blob) => {
                    if (!blob) {
                        resolve(canvas.toDataURL('image/jpeg', quality));
                        return;
                    }

                    try {
                        const fileExt = file.name ? file.name.split('.').pop() : 'jpg';
                        const fileName = `${folder}/${Date.now()}_${Math.random().toString(36).substring(2, 8)}.${fileExt}`;

                        // Upload to Supabase Storage Bucket 'school-media'
                        const { data, error } = await supabase.storage
                            .from('school-media')
                            .upload(fileName, blob, {
                                contentType: 'image/jpeg',
                                cacheControl: '3600',
                                upsert: true
                            });

                        if (error) {
                            console.warn('Supabase storage upload notice (using optimized fallback):', error.message);
                            resolve(canvas.toDataURL('image/jpeg', quality));
                            return;
                        }

                        // Get Public URL
                        const { data: urlData } = supabase.storage
                            .from('school-media')
                            .getPublicUrl(fileName);

                        resolve(urlData?.publicUrl || canvas.toDataURL('image/jpeg', quality));
                    } catch (err) {
                        console.warn('Storage fallback applied:', err);
                        resolve(canvas.toDataURL('image/jpeg', quality));
                    }
                }, 'image/jpeg', quality);
            };

            img.onerror = () => resolve(null);
            img.src = readerEvent.target.result;
        };

        reader.onerror = () => resolve(null);
        reader.readAsDataURL(file);
    });
}

/**
 * Default Seed Dataset (Matching original SDN Tunggaljaya 2 profile)
 */
export const DEFAULT_SCHOOL_DATA = {
    profile: {
        id: "main",
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
        phone: "(0253) 8812-901",
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
            published_at: "2026-08-22T21:36:00Z"
        },
        {
            title: "Tim Pramuka SDN Tunggaljaya 2 Meraih Juara Umum Lomba Regu Tingkat Kabupaten",
            slug: "tim-pramuka-sdn-tunggaljaya-2-meraih-juara-umum-lomba-regu",
            category: "Prestasi",
            excerpt: "Prestasi membanggakan kembali diraih oleh kontingen Pramuka Penggalang SDN Tunggaljaya 2 dalam ajang Jambore dan Lomba Regu Prestasi.",
            content: "<p>Alhamdulillah, puji syukur kepada Tuhan Yang Maha Esa, regu Pramuka Penggalang SDN Tunggaljaya 2 berhasil menorehkan prestasi gemilang dengan meraih gelar <strong>Juara Umum</strong> pada ajang Lomba Tingkat Regu Pramuka tingkat Kabupaten Pandeglang.</p><p>Kepala Sekolah menyampaikan apresiasi setinggi-tingginya kepada seluruh pembina, pelatih, serta siswa-siswi yang telah berjuang dengan penuh kedisiplinan dan sportivitas.</p>",
            image: "https://images.unsplash.com/photo-1526976668912-1a811878dd37?q=80&w=800&auto=format&fit=crop",
            is_published: true,
            published_at: "2026-08-20T14:15:00Z"
        },
        {
            title: "Peluncuran Program Literasi Digital & Extrakulikuler Coding untuk Kelas IV-VI",
            slug: "peluncuran-program-literasi-digital-extrakulikuler-coding",
            category: "Berita",
            excerpt: "Mempersiapkan siswa menghadapi era teknologi dengan program pengenalan dasar komputer dan logika pemrograman visual.",
            content: "<p>SDN Tunggaljaya 2 resmi meluncurkan kegiatan ekstrakulikuler baru yaitu <strong>Literasi Digital & Pengenalan Logika Coding Dasar</strong> yang ditujukan bagi siswa kelas IV, V, dan VI.</p><p>Program ini memanfaatkan fasilitas laboratorium komputer sekolah untuk melatih anak berpikir komputasional, kreatif, dan cerdas dalam memanfaatkan teknologi informasi secara positif.</p>",
            image: "https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop",
            is_published: true,
            published_at: "2026-08-18T10:00:00Z"
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
