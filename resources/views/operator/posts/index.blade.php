@extends('layouts.operator')

@section('title', 'Kelola Berita & PPDB - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Berita & Pengumuman PPDB')

@section('content')

<div class="space-y-6 sm:space-y-8">
    
    <!-- Add Post Form with Drag & Drop Upload -->
    <div class="bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-pen-nib text-primary"></i> Buat Berita / Pengumuman / PPDB Baru
        </h2>

        <form action="{{ route('operator.posts.store', [], false) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-primary mb-1">Judul Artikel / Pengumuman</label>
                    <input type="text" name="title" required placeholder="Contoh: Info Penerimaan Siswa Baru Tahun 2026" class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Kategori</label>
                    <select name="category" required class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs font-bold text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                        <option value="Berita">Berita</option>
                        <option value="Pengumuman">Pengumuman (PPDB)</option>
                        <option value="Prestasi">Prestasi Siswa</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Ringkasan Singkat (Excerpt)</label>
                <input type="text" name="excerpt" placeholder="Ringkasan 1-2 kalimat untuk kartu depan..." class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
            </div>

            <!-- Drag and Drop Image Box -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-8">
                    <label class="block text-xs font-bold text-primary mb-1">Gambar Banner / Header Artikel (Drag & Drop dari PC)</label>
                    <div id="dropzone-post" 
                         class="relative border-2 border-dashed border-primary/50 hover:border-primary bg-[#9e6f54]/60 hover:bg-[#9e6f54] rounded-2xl p-4 text-center cursor-pointer transition flex flex-col items-center justify-center min-h-[100px] group">
                        <input type="file" name="image_file" id="file-post" accept="image/*" class="hidden">
                        
                        <div id="prompt-post" class="space-y-1">
                            <div class="w-8 h-8 rounded-lg bg-[#835841] text-primary flex items-center justify-center mx-auto text-sm group-hover:scale-110 transition transform">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div class="text-xs font-bold text-white">
                                Tarik & Lepas gambar banner dari PC, atau <span class="text-primary underline">Pilih File</span>
                            </div>
                            <div class="text-[10px] text-primary-200">
                                JPG, PNG, WEBP (Maks 5MB)
                            </div>
                        </div>

                        <div id="preview-box-post" class="hidden flex items-center gap-3 w-full">
                            <img id="preview-img-post" src="#" alt="Preview" class="w-16 h-12 rounded-xl object-cover border-2 border-primary shadow shrink-0">
                            <div class="text-left flex-grow truncate">
                                <div id="filename-post" class="text-xs font-bold text-white truncate">banner.jpg</div>
                                <div id="filesize-post" class="text-[10px] text-primary-200">0 KB</div>
                            </div>
                            <button type="button" id="remove-btn-post" class="p-1.5 rounded-lg bg-rose-600/40 hover:bg-rose-600 text-rose-100 transition shrink-0">
                                <i class="fa-solid fa-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-[11px] font-bold text-primary-200 mb-1">Atau URL Gambar:</label>
                    <input type="text" name="image" placeholder="https://..." class="w-full px-3 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/50 focus:outline-none focus:border-primary">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Isi Lengkap Konten (HTML / Teks)</label>
                <textarea name="content" rows="4" required placeholder="Tulis isi pengumuman atau berita di sini..." class="w-full p-3.5 sm:p-4 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary"></textarea>
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between pt-2 gap-3">
                <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-primary">
                    <input type="checkbox" name="is_published" value="1" checked class="rounded bg-[#9e6f54] border-[#835841] text-primary focus:ring-0">
                    <span>Terbitkan Langsung ke Publik</span>
                </label>
                <button type="submit" class="w-full sm:w-auto px-6 py-2.5 rounded-xl bg-primary hover:bg-primary-200 text-secondary-950 font-extrabold text-xs shadow-md transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane text-secondary"></i> Publikasikan Konten
                </button>
            </div>
        </form>
    </div>

    <!-- Posts Table -->
    <div class="bg-secondary text-white rounded-2xl border border-[#9e6f54] shadow-xl overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-[#9e6f54]">
            <h3 class="text-sm sm:text-base font-bold text-white">Daftar Konten Diterbitkan ({{ count($posts) }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-white whitespace-nowrap">
                <thead class="bg-[#9e6f54] text-primary uppercase font-bold border-b border-[#835841]">
                    <tr>
                        <th class="px-4 sm:px-6 py-3.5">Judul</th>
                        <th class="px-4 sm:px-6 py-3.5">Kategori</th>
                        <th class="px-4 sm:px-6 py-3.5">Tanggal Publish</th>
                        <th class="px-4 sm:px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#835841]">
                    @forelse($posts as $post)
                        <tr class="hover:bg-[#9e6f54]/50 transition">
                            <td class="px-4 sm:px-6 py-3 font-bold text-white max-w-xs truncate">
                                <a href="{{ route('news.detail', $post->slug, false) }}" target="_blank" class="hover:text-primary">{{ $post->title }}</a>
                            </td>
                            <td class="px-4 sm:px-6 py-3">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#3b2116] text-primary border border-[#6d4330]">
                                    {{ $post->category }}
                                </span>
                            </td>
                            <td class="px-4 sm:px-6 py-3 font-mono text-primary-200">{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</td>
                            <td class="px-4 sm:px-6 py-3 text-right">
                                <form action="{{ route('operator.posts.delete', $post->id, false) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-600/30 text-rose-200 hover:bg-rose-600 hover:text-white font-bold transition border border-rose-500/40">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-primary-200">Belum ada konten berita atau pengumuman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    function setupPostDragDrop() {
        const dropzone = document.getElementById('dropzone-post');
        const fileInput = document.getElementById('file-post');
        const prompt = document.getElementById('prompt-post');
        const previewBox = document.getElementById('preview-box-post');
        const previewImg = document.getElementById('preview-img-post');
        const filenameElem = document.getElementById('filename-post');
        const filesizeElem = document.getElementById('filesize-post');
        const removeBtn = document.getElementById('remove-btn-post');

        if (!dropzone || !fileInput) return;

        dropzone.addEventListener('click', (e) => {
            if (e.target !== removeBtn && !removeBtn?.contains(e.target)) {
                fileInput.click();
            }
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.add('border-primary', 'bg-primary/20', 'scale-[1.01]');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.remove('border-primary', 'bg-primary/20', 'scale-[1.01]');
            }, false);
        });

        dropzone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files && files.length > 0) {
                fileInput.files = files;
                handleFile(files[0]);
            }
        });

        fileInput.addEventListener('change', (e) => {
            if (fileInput.files && fileInput.files.length > 0) {
                handleFile(fileInput.files[0]);
            }
        });

        function handleFile(file) {
            if (!file.type.startsWith('image/')) {
                alert('File yang dipilih harus berupa gambar (JPG, PNG, WEBP, GIF).');
                reset();
                return;
            }
            filenameElem.textContent = file.name;
            filesizeElem.textContent = (file.size / 1024 < 1024) 
                ? (file.size / 1024).toFixed(1) + ' KB' 
                : (file.size / (1024 * 1024)).toFixed(2) + ' MB';

            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                prompt.classList.add('hidden');
                previewBox.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        function reset() {
            fileInput.value = '';
            previewImg.src = '#';
            prompt.classList.remove('hidden');
            previewBox.classList.add('hidden');
        }

        removeBtn?.addEventListener('click', (e) => {
            e.stopPropagation();
            reset();
        });
    }

    setupPostDragDrop();
</script>

@endsection
