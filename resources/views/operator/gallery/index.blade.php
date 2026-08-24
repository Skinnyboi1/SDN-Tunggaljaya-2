@extends('layouts.operator')

@section('title', 'Kelola Galeri Foto - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Dokumentasi Galeri')

@section('content')

<div class="space-y-6 sm:space-y-8">
    
    <!-- Add Gallery Form with Drag & Drop Upload -->
    <div class="bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-image text-primary"></i> Tambah Foto Galeri Baru
        </h2>

        <form action="{{ route('operator.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Judul / Keterangan Foto</label>
                    <input type="text" name="title" required placeholder="Contoh: Upacara Bendera HUT RI" class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Kategori Foto</label>
                    <input type="text" name="category" required placeholder="Kegiatan / Olahraga / Seni / Prestasi" class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <!-- Drag and Drop Image Box -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-8">
                    <label class="block text-xs font-bold text-primary mb-1">Upload File Foto (Drag & Drop dari PC)</label>
                    <div id="dropzone-gallery" 
                         class="relative border-2 border-dashed border-primary/50 hover:border-primary bg-[#9e6f54]/60 hover:bg-[#9e6f54] rounded-2xl p-4 text-center cursor-pointer transition flex flex-col items-center justify-center min-h-[100px] group">
                        <input type="file" name="image_file" id="file-gallery" accept="image/*" class="hidden">
                        
                        <div id="prompt-gallery" class="space-y-1">
                            <div class="w-8 h-8 rounded-lg bg-[#835841] text-primary flex items-center justify-center mx-auto text-sm group-hover:scale-110 transition transform">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div class="text-xs font-bold text-white">
                                Tarik & Lepas foto dokumentasi dari PC, atau <span class="text-primary underline">Pilih File</span>
                            </div>
                            <div class="text-[10px] text-primary-200">
                                JPG, PNG, WEBP (Maks 5MB)
                            </div>
                        </div>

                        <div id="preview-box-gallery" class="hidden flex items-center gap-3 w-full">
                            <img id="preview-img-gallery" src="#" alt="Preview" class="w-14 h-14 rounded-xl object-cover border-2 border-primary shadow shrink-0">
                            <div class="text-left flex-grow truncate">
                                <div id="filename-gallery" class="text-xs font-bold text-white truncate">foto.jpg</div>
                                <div id="filesize-gallery" class="text-[10px] text-primary-200">0 KB</div>
                            </div>
                            <button type="button" id="remove-btn-gallery" class="p-1.5 rounded-lg bg-rose-600/40 hover:bg-rose-600 text-rose-100 transition shrink-0">
                                <i class="fa-solid fa-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-4 space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-primary-200 mb-1">Atau Gunakan URL Gambar:</label>
                        <input type="text" name="image" placeholder="https://..." class="w-full px-3 py-2 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/50 focus:outline-none focus:border-primary">
                    </div>
                    
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-primary hover:bg-primary-200 text-secondary-950 font-extrabold text-xs shadow-md transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-plus text-secondary"></i> Unggah Foto Galeri
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
        @foreach($galleries as $gal)
            <div class="bg-secondary text-white rounded-2xl border border-[#9e6f54] shadow-xl overflow-hidden p-3 space-y-2 hover:border-primary transition">
                <div class="h-40 sm:h-44 rounded-xl overflow-hidden bg-slate-900 border border-[#835841]">
                    <img src="{{ $gal->image }}" alt="{{ $gal->title }}" class="w-full h-full object-cover">
                </div>
                <div class="flex items-center justify-between pt-1">
                    <div class="min-w-0 pr-2">
                        <span class="text-[10px] font-bold text-primary uppercase block">{{ $gal->category }}</span>
                        <h4 class="font-bold text-white text-xs truncate">{{ $gal->title }}</h4>
                    </div>
                    <form action="{{ route('operator.gallery.delete', $gal->id) }}" method="POST" onsubmit="return confirm('Hapus foto galeri ini?')" class="shrink-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-lg bg-rose-600/30 text-rose-200 hover:bg-rose-600 hover:text-white transition border border-rose-500/40">
                            <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    function setupGalleryDragDrop() {
        const dropzone = document.getElementById('dropzone-gallery');
        const fileInput = document.getElementById('file-gallery');
        const prompt = document.getElementById('prompt-gallery');
        const previewBox = document.getElementById('preview-box-gallery');
        const previewImg = document.getElementById('preview-img-gallery');
        const filenameElem = document.getElementById('filename-gallery');
        const filesizeElem = document.getElementById('filesize-gallery');
        const removeBtn = document.getElementById('remove-btn-gallery');

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

    setupGalleryDragDrop();
</script>

@endsection
