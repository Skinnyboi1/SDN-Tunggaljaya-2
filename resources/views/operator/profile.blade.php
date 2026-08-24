@extends('layouts.operator')

@section('title', 'Edit Profil Sekolah - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Profil Sekolah')

@section('content')

<div class="max-w-4xl bg-secondary text-white p-5 sm:p-8 rounded-2xl border border-[#9e6f54] shadow-xl space-y-6">
    
    <div>
        <h2 class="text-lg sm:text-xl font-bold text-white">Form Pengeditan Profil Sekolah</h2>
        <p class="text-xs text-primary">Perubahan informasi di halaman ini akan langsung diperbarui di tampilan publik (Guest).</p>
    </div>

    <form action="{{ route('operator.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Identitas Utama -->
        <div class="border-b border-[#9e6f54] pb-6 space-y-4">
            <h3 class="text-xs sm:text-sm font-bold text-primary uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-school"></i> Identitas Utama Sekolah
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Nama Sekolah</label>
                    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">NPSN</label>
                    <input type="text" name="npsn" value="{{ old('npsn', $profile->npsn) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Akreditasi</label>
                    <input type="text" name="akreditasi" value="{{ old('akreditasi', $profile->akreditasi) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Nama Kepala Sekolah</label>
                    <input type="text" name="principal_name" value="{{ old('principal_name', $profile->principal_name) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <!-- Foto Kepala Sekolah Drag & Drop Upload -->
            <div>
                <label class="block text-xs font-bold text-primary mb-1.5 flex flex-wrap items-center justify-between gap-1">
                    <span><i class="fa-solid fa-image text-primary mr-1"></i> Foto Kepala Sekolah</span>
                    <span class="text-[11px] text-primary-200 font-normal">Tarik & lepas file atau pilih dari PC</span>
                </label>
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
                    <!-- Drag & Drop Box -->
                    <div class="lg:col-span-8">
                        <div id="dropzone-principal" 
                             class="relative border-2 border-dashed border-primary/50 hover:border-primary bg-[#9e6f54]/60 hover:bg-[#9e6f54] rounded-2xl p-4 sm:p-6 text-center cursor-pointer transition flex flex-col items-center justify-center min-h-[120px] group">
                            <input type="file" name="principal_photo_file" id="file-principal" accept="image/*" class="hidden">
                            
                            <div id="prompt-principal" class="space-y-2">
                                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-[#835841] text-primary flex items-center justify-center mx-auto text-lg sm:text-xl group-hover:scale-110 transition transform shadow">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </div>
                                <div class="text-xs font-bold text-white">
                                    Tarik & Lepas foto dari PC ke sini, atau <span class="text-primary underline">Pilih File</span>
                                </div>
                                <div class="text-[11px] text-primary-200">
                                    Format didukung: JPG, PNG, WEBP (Maks 5MB)
                                </div>
                            </div>

                            <div id="preview-box-principal" class="hidden flex items-center gap-3 sm:gap-4 w-full">
                                <img id="preview-img-principal" src="#" alt="Preview" class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl object-cover border-2 border-primary shadow shrink-0">
                                <div class="text-left flex-grow truncate">
                                    <div id="filename-principal" class="text-xs font-bold text-white truncate">file.jpg</div>
                                    <div id="filesize-principal" class="text-[10px] text-primary-200">0 KB</div>
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded bg-emerald-500/30 text-emerald-200 text-[10px] font-bold">Siap diunggah</span>
                                </div>
                                <button type="button" id="remove-btn-principal" class="p-2 rounded-lg bg-rose-600/40 hover:bg-rose-600 text-rose-100 transition shrink-0">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Current Photo & URL fallback -->
                    <div class="lg:col-span-4 bg-[#9e6f54] p-3.5 rounded-2xl border border-[#835841] space-y-2">
                        <div class="text-[11px] font-bold text-primary">Foto Aktif Sekarang:</div>
                        <div class="flex items-center gap-3">
                            <img src="{{ $profile->principal_photo ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=200&auto=format&fit=crop' }}" 
                                 alt="Foto Saat Ini" 
                                 class="w-12 h-12 rounded-xl object-cover border border-primary/50 shadow shrink-0">
                            <div class="text-[11px] text-primary-200 truncate flex-grow">
                                Digunakan di beranda
                            </div>
                        </div>
                        <div class="pt-2 border-t border-[#835841]/80">
                            <label class="block text-[10px] font-bold text-primary-200 mb-1">Atau gunakan URL Gambar:</label>
                            <input type="text" name="principal_photo" value="{{ old('principal_photo', $profile->principal_photo) }}" placeholder="https://..." class="w-full px-2.5 py-1.5 bg-[#835841] border border-[#6c4837] rounded-lg text-xs text-white placeholder-primary/50 focus:outline-none focus:border-primary">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Sambutan Kepala Sekolah</label>
                <textarea name="principal_welcome" rows="4" class="w-full p-3.5 sm:p-4 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">{{ old('principal_welcome', $profile->principal_welcome) }}</textarea>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="border-b border-[#9e6f54] pb-6 space-y-4">
            <h3 class="text-xs sm:text-sm font-bold text-primary uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-compass"></i> Visi & Misi Sekolah
            </h3>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Visi Sekolah</label>
                <textarea name="vision" rows="2" class="w-full p-3.5 sm:p-4 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">{{ old('vision', $profile->vision) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Misi Sekolah (Satu misi per baris/line)</label>
                <textarea name="mission_text" rows="5" class="w-full p-3.5 sm:p-4 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm font-mono text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">{{ old('mission_text', is_array($profile->mission) ? implode("\n", $profile->mission) : '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Sejarah & Gambaran Umum Sekolah</label>
                <textarea name="history" rows="3" class="w-full p-3.5 sm:p-4 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">{{ old('history', $profile->history) }}</textarea>
            </div>
        </div>

        <!-- Statistik Peserta Didik & Kontak -->
        <div class="space-y-4">
            <h3 class="text-xs sm:text-sm font-bold text-primary uppercase tracking-wider flex items-center gap-2">
                <i class="fa-solid fa-address-book"></i> Statistik & Kontak
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Jumlah Siswa</label>
                    <input type="number" name="student_count" value="{{ old('student_count', $profile->student_count) }}" required class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Jumlah Guru/Staf</label>
                    <input type="number" name="teacher_count" value="{{ old('teacher_count', $profile->teacher_count) }}" required class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Jumlah Rombel/Kelas</label>
                    <input type="number" name="class_count" value="{{ old('class_count', $profile->class_count) }}" required class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Email Sekolah</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Alamat Lengkap</label>
                <input type="text" name="address" value="{{ old('address', $profile->address) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
            </div>

            <div>
                <label class="block text-xs font-bold text-primary mb-1">Google Maps Embed URL</label>
                <input type="text" name="map_url" value="{{ old('map_url', $profile->map_url) }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
            </div>
        </div>

        <div class="pt-4 flex justify-end">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 rounded-xl bg-primary hover:bg-primary-200 text-secondary-950 font-extrabold text-sm shadow-md transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-floppy-disk text-secondary"></i> Simpan Perubahan Profil
            </button>
        </div>

    </form>

</div>

<script>
    function setupDragAndDrop(dropzoneId, fileInputId, promptId, previewBoxId, previewImgId, filenameId, filesizeId, removeBtnId) {
        const dropzone = document.getElementById(dropzoneId);
        const fileInput = document.getElementById(fileInputId);
        const prompt = document.getElementById(promptId);
        const previewBox = document.getElementById(previewBoxId);
        const previewImg = document.getElementById(previewImgId);
        const filenameElem = document.getElementById(filenameId);
        const filesizeElem = document.getElementById(filesizeId);
        const removeBtn = document.getElementById(removeBtnId);

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

    setupDragAndDrop('dropzone-principal', 'file-principal', 'prompt-principal', 'preview-box-principal', 'preview-img-principal', 'filename-principal', 'filesize-principal', 'remove-btn-principal');
</script>

@endsection
