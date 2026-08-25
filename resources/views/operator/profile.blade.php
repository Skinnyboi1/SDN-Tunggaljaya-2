@extends('layouts.operator')

@section('title', 'Edit Profil Sekolah - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Profil Sekolah')

@section('content')

<div class="max-w-4xl bg-secondary text-white p-5 sm:p-8 rounded-2xl border border-[#9e6f54] shadow-xl space-y-6">
    
    <div>
        <h2 class="text-lg sm:text-xl font-bold text-white">Form Pengeditan Profil Sekolah</h2>
        <p class="text-xs text-primary">Perubahan informasi di halaman ini akan langsung diperbarui di tampilan publik (Guest).</p>
    </div>

    <form action="{{ route('operator.profile.update', [], false) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
                    <input type="text" name="akreditasi" value="{{ old('akreditasi', $profile->akreditasi ?? 'B') }}" class="w-full px-4 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-sm text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
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
