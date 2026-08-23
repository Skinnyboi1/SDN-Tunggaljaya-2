<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolProfile;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Post;
use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Default Operator User
        $operator = User::firstOrCreate(
            ['email' => 'operator@tunggaljaya2.sch.id'],
            [
                'name' => 'Operator SDN Tunggaljaya 2',
                'password' => Hash::make('password123'),
                'role' => 'operator',
            ]
        );

        // Also create a demo Guest User account if needed
        User::firstOrCreate(
            ['email' => 'guest@tunggaljaya2.sch.id'],
            [
                'name' => 'Tamu Pembaca',
                'password' => Hash::make('password123'),
                'role' => 'guest',
            ]
        );

        // 2. Create School Profile
        SchoolProfile::truncate();
        SchoolProfile::create([
            'name' => 'SDN Tunggaljaya 2',
            'npsn' => '20215432',
            'akreditasi' => 'A (Unggul)',
            'principal_name' => 'Hj. Siti Rahmawati, S.Pd., M.M.',
            'principal_welcome' => 'Selamat datang di Website Resmi SDN Tunggaljaya 2. Kami berkomitmen untuk menyelenggarakan pendidikan dasar yang berkarakter, inovatif, berbasis teknologi modern, dan berlandaskan nilai-nilai imtak serta iptek untuk mencetak generasi penerus bangsa yang unggul dan berprestasi.',
            'principal_photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop',
            'history' => 'SDN Tunggaljaya 2 didirikan pada tahun 1985 sebagai wujud kepedulian terhadap pendidikan anak usia sekolah dasar di wilayah Tunggaljaya. Berada di lingkungan yang asri dan aman, sekolah kami terus berkembang pesat dalam penyediaan sarana prasarana modern, kurikulum berstandar nasional, dan prestasi di bidang akademik maupun non-akademik.',
            'vision' => 'Terwujudnya Peserta Didik yang Budi Pekerti Luhur, Cerdas, Inovatif, Berwawasan Lingkungan, dan Unggul dalam Prestasi.',
            'mission' => [
                'Menyelenggarakan pembelajaran berorientasi pada pengembangan karakter Islami dan budi pekerti luhur.',
                'Mengembangkan pembelajaran aktif, kreatif, efektif, dan menyenangkan berbasis teknologi digital.',
                'Menumbuhkan semangat berprestasi dalam bidang akademik, seni, dan olahraga bagi seluruh warga sekolah.',
                'Menciptakan lingkungan sekolah yang bersih, hijau, sehat, dan kondusif untuk tumbuh kembang anak.'
            ],
            'address' => 'Jl. Pendidikan No. 42, Tunggaljaya, Kec. Sumur, Kabupaten Pandeglang, Banten 42283',
            'phone' => '(0253) 8812-901',
            'email' => 'info@sdntunggaljaya2.sch.id',
            'map_url' => 'https://maps.google.com/maps?q=Sumur+Pandeglang&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'student_count' => 384,
            'teacher_count' => 12,
            'class_count' => 12,
        ]);

        // 3. Create Teachers
        Teacher::truncate();
        $teachersData = [
            [
                'name' => 'ADE SUMARNA, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/ADE SUMARNA, S.Pd.jpeg',
                'order' => 1
            ],
            [
                'name' => 'ALIMUDIN, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/ALIMUDIN, S.Pd.jpeg',
                'order' => 2
            ],
            [
                'name' => 'ANIS KHUATUL SRI RAHAYU, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/ANIS KHUATUL SRI RAHAYU, S.Pd.jpeg',
                'order' => 3
            ],
            [
                'name' => 'ENCEP IR, S.S.',
                'nip' => null,
                'position' => 'Guru Bahasa',
                'photo' => '/uploads/teachers/ENCEP IR, S.S.jpeg',
                'order' => 4
            ],
            [
                'name' => 'EROH HERNAWATI, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/EROH HERNAWATI, S.Pd.jpeg',
                'order' => 5
            ],
            [
                'name' => 'FITRIA FEBRIYANTI, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/FITRIA FEBRIYANTI, S.Pd.jpeg',
                'order' => 6
            ],
            [
                'name' => 'IDA ROSIDA, S.Pd.I.',
                'nip' => null,
                'position' => 'Guru Pendidikan Agama Islam',
                'photo' => '/uploads/teachers/IDA ROSIDA, S.Pd.I.jpeg',
                'order' => 7
            ],
            [
                'name' => 'RISMA RISDIYANTI, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas',
                'photo' => '/uploads/teachers/RISMA RISDIYANTI, S.Pd.jpeg',
                'order' => 8
            ],
            [
                'name' => 'SACHRUDIYANTO, S.Pd.',
                'nip' => null,
                'position' => 'Guru PJOK',
                'photo' => '/uploads/teachers/SACHRUDIYANTO, S.Pd.jpeg',
                'order' => 9
            ],
            [
                'name' => 'SAEFUL ANHAR',
                'nip' => null,
                'position' => 'Tenaga Kependidikan & Staf TU',
                'photo' => '/uploads/teachers/SAEFUL ANHAR.jpeg',
                'order' => 10
            ],
            [
                'name' => 'YOGI SAPUTRA PAMUNGKAS, S.Pd.',
                'nip' => null,
                'position' => 'Guru Kelas & TIK',
                'photo' => '/uploads/teachers/YOGI SAPUTRA PAMUNGKAS, S.Pd.jpeg',
                'order' => 11
            ],
            [
                'name' => 'YUNIDAR RIFA\'ATUL MUKARROMAH, S.E.',
                'nip' => null,
                'position' => 'Bendahara & Staf Admin',
                'photo' => '/uploads/teachers/YUNIDAR RIFA\'ATUL MUKARROMAH, S.E.jpeg',
                'order' => 12
            ],
        ];
        foreach ($teachersData as $teacher) {
            Teacher::create($teacher);
        }

        // 4. Create Facilities
        Facility::truncate();
        $facilitiesData = [
            [
                'name' => 'Laboratorium Komputer & TIK',
                'description' => 'Dilengkapi 30 unit PC modern dengan koneksi internet cepat untuk menunjang literasi digital peserta didik.',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop',
                'icon' => 'laptop'
            ],
            [
                'name' => 'Perpustakaan Literasi Cerdas',
                'description' => 'Koleksi ribuan buku pelajaran, sains, dongeng, dan sudut baca digital yang nyaman dan ber-AC.',
                'image' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=600&auto=format&fit=crop',
                'icon' => 'book'
            ],
            [
                'name' => 'Ruang Kelas Multimedia',
                'description' => 'Ruang belajar interaktif dilengkapi dengan Smart Projector, proyektor pro, dan ventilasi udara yang sejuk.',
                'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=600&auto=format&fit=crop',
                'icon' => 'desktop'
            ],
            [
                'name' => 'Lapangan Olahraga Serbaguna',
                'description' => 'Fasilitas outdoor untuk bulutangkis, bola basket, futsal, dan upacara bendera mingguan.',
                'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=600&auto=format&fit=crop',
                'icon' => 'football'
            ],
            [
                'name' => 'Kantin Sehat & Higenis',
                'description' => 'Kantin sekolah terverifikasi Dinas Kesehatan menyediakan makanan nutrisi seimbang untuk para siswa.',
                'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=600&auto=format&fit=crop',
                'icon' => 'utensils'
            ],
            [
                'name' => 'Ruang UKS & Konseling',
                'description' => 'Fasilitas kesehatan pertolongan pertama dengan dokter kecil pembina terdedikasi.',
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=600&auto=format&fit=crop',
                'icon' => 'first-aid'
            ],
        ];
        foreach ($facilitiesData as $fac) {
            Facility::create($fac);
        }

        // 5. Create Sample Posts / News
        Post::truncate();
        $postsData = [
            [
                'title' => 'Penerimaan Peserta Didik Baru (PPDB) SDN Tunggaljaya 2 Tahun Ajaran 2026/2027',
                'slug' => Str::slug('Penerimaan Peserta Didik Baru PPDB SDN Tunggaljaya 2 2026 2027'),
                'category' => 'Pengumuman',
                'excerpt' => 'SDN Tunggaljaya 2 membuka pendaftaran calon siswa baru. Simak syarat, jadwal gelombang, dan mekanisme pendaftaran lengkapnya di sini.',
                'content' => '<p>SDN Tunggaljaya 2 resmi membuka <strong>Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2026/2027</strong>. Pendaftaran dapat dilakukan secara online melalui website ini atau langsung datang ke sekretariat PPDB sekolah.</p><h3>Persyaratan Pendaftaran:</h3><ul><li>Akte Kelahiran (Fotokopi)</li><li>Kartu Keluarga / KK (Fotokopi)</li><li>Pasfoto Ukuran 3x4 (3 Lembar)</li><li>Usia Minimal 6 Tahun per 1 Juli 2026</li></ul><p>Mari bergabung menjadi bagian dari keluarga besar SDN Tunggaljaya 2!</p>',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'author_id' => $operator->id,
            ],
            [
                'title' => 'Tim Pramuka SDN Tunggaljaya 2 Meraih Juara Umum Lomba Regu Tingkat Kabupaten',
                'slug' => Str::slug('Tim Pramuka SDN Tunggaljaya 2 Meraih Juara Umum Lomba Regu'),
                'category' => 'Prestasi',
                'excerpt' => 'Kabar membanggakan! Regu Penggalang SDN Tunggaljaya 2 berhasil membawa pulang trofi Juara Umum dalam ajang Jambore Kabupaten.',
                'content' => '<p>Regu Penggalang Pramuka SDN Tunggaljaya 2 berhasil menorehkan prestasi gemilang dengan menyabet predikat <strong>Juara Umum</strong> dalam Jambore dan Lomba Regu Pramuka Sekolah Dasar.</p><p>Kepala Sekolah Hj. Siti Rahmawati mengapresiasi tinggi perjuangan para siswa dan pembina yang telah berlatih disiplin selama 2 bulan terakhir.</p>',
                'image' => 'https://images.unsplash.com/photo-1526976668912-1a811878dd37?q=80&w=800&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'author_id' => $operator->id,
            ],
            [
                'title' => 'Peluncuran Program Literasi Digital & Extrakulikuler Coding untuk Kelas IV-VI',
                'slug' => Str::slug('Peluncuran Program Literasi Digital Extrakulikuler Coding'),
                'category' => 'Berita',
                'excerpt' => 'Mengawali semester baru, SDN Tunggaljaya 2 meluncurkan ekstrakurikuler baru di bidang Coding & Logika Komputer.',
                'content' => '<p>Dalam upaya membekali siswa dengan keahlian abad ke-21, SDN Tunggaljaya 2 secara resmi memulai program <i>Elementary Coding Club</i>.</p><p>Siswa akan diajarkan dasar logika pemrograman, animasi 2D, dan pengenalan kecerdasan buatan secara interaktif dan menyenangkan.</p>',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'author_id' => $operator->id,
            ],
        ];
        foreach ($postsData as $p) {
            Post::create($p);
        }

        // 6. Create Gallery
        Gallery::truncate();
        $galleryData = [
            [
                'title' => 'Kegiatan Upacara Bendera Hari Senin',
                'image' => 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=600&auto=format&fit=crop',
                'category' => 'Upacara'
            ],
            [
                'title' => 'Praktek Sains di Laboratorium Komputer',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop',
                'category' => 'Akademik'
            ],
            [
                'title' => 'Latihan Rutin Pramuka Penggalang',
                'image' => 'https://images.unsplash.com/photo-1526976668912-1a811878dd37?q=80&w=600&auto=format&fit=crop',
                'category' => 'Ekstrakurikuler'
            ],
            [
                'title' => 'Pentas Seni & Kreasi Siswa Akhir Tahun',
                'image' => 'https://images.unsplash.com/photo-1460518451285-97b6aa326961?q=80&w=600&auto=format&fit=crop',
                'category' => 'Seni & Budaya'
            ],
            [
                'title' => 'Lomba Olahraga Sepakbola Antar Kelas',
                'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80&w=600&auto=format&fit=crop',
                'category' => 'Olahraga'
            ],
            [
                'title' => 'Kerja Bakti Lingkungan Sekolah Hijau',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=600&auto=format&fit=crop',
                'category' => 'Lingkungan'
            ],
        ];
        foreach ($galleryData as $gal) {
            Gallery::create($gal);
        }
    }
}
