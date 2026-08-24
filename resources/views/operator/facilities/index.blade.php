@extends('layouts.operator')

@section('title', 'Kelola Fasilitas - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Fasilitas Sekolah')

@section('content')

<div class="space-y-6 sm:space-y-8">
    
    <!-- Add Facility Form with Drag & Drop Upload -->
    <div class="bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-plus-circle text-primary"></i> Tambah Fasilitas Baru
        </h2>

        <form action="{{ route('operator.facilities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Nama Fasilitas</label>
                    <input type="text" name="name" required placeholder="Contoh: Perpustakaan Digital" class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Deskripsi Singkat</label>
                    <input type="text" name="description" placeholder="Fasilitas pendukung pembelajaran..." class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <!-- Drag and Drop Image Box -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-8">
                    <label class="block text-xs font-bold text-primary mb-1">Foto Fasilitas (Drag & Drop dari PC)</label>
                    <div id="dropzone-facility" 
                         class="relative border-2 border-dashed border-primary/50 hover:border-primary bg-[#9e6f54]/60 hover:bg-[#9e6f54] rounded-2xl p-4 text-center cursor-pointer transition flex flex-col items-center justify-center min-h-[100px] group">
                        <input type="file" name="image_file" id="file-facility" accept="image/*" class="hidden">
                        
                        <div id="prompt-facility" class="space-y-1">
                            <div class="w-8 h-8 rounded-lg bg-[#835841] text-primary flex items-center justify-center mx-auto text-sm group-hover:scale-110 transition transform">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div class="text-xs font-bold text-white">
                                Tarik & Lepas foto fasilitas dari PC, atau <span class="text-primary underline">Pilih File</span>
                            </div>
                            <div class="text-[10px] text-primary-200">
                                JPG, PNG, WEBP (Maks 5MB)
                            </div>
                        </div>

                        <div id="preview-box-facility" class="hidden flex items-center gap-3 w-full">
                            <img id="preview-img-facility" src="#" alt="Preview" class="w-12 h-12 rounded-xl object-cover border-2 border-primary shadow shrink-0">
                            <div class="text-left flex-grow truncate">
                                <div id="filename-facility" class="text-xs font-bold text-white truncate">fasilitas.jpg</div>
                                <div id="filesize-facility" class="text-[10px] text-primary-200">0 KB</div>
                            </div>
                            <button type="button" id="remove-btn-facility" class="p-1.5 rounded-lg bg-rose-600/40 hover:bg-rose-600 text-rose-100 transition shrink-0">
                                <i class="fa-solid fa-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-4 space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-primary-200 mb-1">Atau URL Gambar:</label>
                        <input type="text" name="image" placeholder="https://..." class="w-full px-3 py-2 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/50 focus:outline-none focus:border-primary">
                    </div>
                    
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-primary hover:bg-primary-200 text-secondary-950 font-extrabold text-xs shadow-md transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-plus text-secondary"></i> Simpan Fasilitas Baru
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Facilities Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
        @foreach($facilities as $fac)
            <div class="bg-secondary text-white rounded-2xl border border-[#9e6f54] shadow-xl overflow-hidden flex flex-col justify-between p-4 space-y-3 hover:border-primary transition">
                <img src="{{ $fac->image ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400&auto=format&fit=crop' }}" alt="{{ $fac->name }}" class="w-full h-36 sm:h-40 object-cover rounded-xl border border-[#835841]">
                <div>
                    <h4 class="font-bold text-white text-sm">{{ $fac->name }}</h4>
                    <p class="text-xs text-primary-100 mt-1 line-clamp-2">{{ $fac->description }}</p>
                </div>
                <div class="pt-2 border-t border-[#9e6f54] flex justify-end">
                    <form action="{{ route('operator.facilities.delete', $fac->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-600/30 text-rose-200 hover:bg-rose-600 hover:text-white text-xs font-bold transition border border-rose-500/40">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    function setupFacilityDragDrop() {
        const dropzone = document.getElementById('dropzone-facility');
        const fileInput = document.getElementById('file-facility');
        const prompt = document.getElementById('prompt-facility');
        const previewBox = document.getElementById('preview-box-facility');
        const previewImg = document.getElementById('preview-img-facility');
        const filenameElem = document.getElementById('filename-facility');
        const filesizeElem = document.getElementById('filesize-facility');
        const removeBtn = document.getElementById('remove-btn-facility');

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

    setupFacilityDragDrop();
</script>

@endsection
