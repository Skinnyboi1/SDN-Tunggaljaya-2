@extends('layouts.operator')

@section('title', 'Kelola Guru & Staf - SDN Tunggaljaya 2')
@section('header_title', 'Kelola Tenaga Pendidik')

@section('content')

<div class="space-y-6 sm:space-y-8">
    
    <!-- Add Teacher Form with Drag & Drop Upload -->
    <div class="bg-secondary text-white p-5 sm:p-6 rounded-2xl border border-[#9e6f54] shadow-xl space-y-4">
        <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-user-plus text-primary"></i> Tambah Tenaga Pendidik Baru
        </h2>

        <form action="{{ route('operator.teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Nama Lengkap & Gelar</label>
                    <input type="text" name="name" required placeholder="Contoh: Budi Santoso, S.Pd." class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-xs font-bold text-primary mb-1">NIP (Opsional)</label>
                    <input type="text" name="nip" placeholder="1990..." class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-xs font-bold text-primary mb-1">Jabatan / Peran</label>
                    <input type="text" name="position" required placeholder="Guru Kelas / PJOK" class="w-full px-3.5 py-2.5 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/60 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary">
                </div>
            </div>

            <!-- Drag and Drop Image Box -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                <div class="sm:col-span-8">
                    <label class="block text-xs font-bold text-primary mb-1">Foto Guru (Drag & Drop dari PC)</label>
                    <div id="dropzone-teacher" 
                         class="relative border-2 border-dashed border-primary/50 hover:border-primary bg-[#9e6f54]/60 hover:bg-[#9e6f54] rounded-2xl p-4 text-center cursor-pointer transition flex flex-col items-center justify-center min-h-[100px] group">
                        <input type="file" name="photo_file" id="file-teacher" accept="image/*" class="hidden">
                        
                        <div id="prompt-teacher" class="space-y-1">
                            <div class="w-8 h-8 rounded-lg bg-[#835841] text-primary flex items-center justify-center mx-auto text-sm group-hover:scale-110 transition transform">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                            </div>
                            <div class="text-xs font-bold text-white">
                                Tarik & Lepas foto dari PC, atau <span class="text-primary underline">Pilih File</span>
                            </div>
                            <div class="text-[10px] text-primary-200">
                                JPG, PNG, WEBP (Maks 5MB)
                            </div>
                        </div>

                        <div id="preview-box-teacher" class="hidden flex items-center gap-3 w-full">
                            <img id="preview-img-teacher" src="#" alt="Preview" class="w-12 h-12 rounded-xl object-cover border-2 border-primary shadow shrink-0">
                            <div class="text-left flex-grow truncate">
                                <div id="filename-teacher" class="text-xs font-bold text-white truncate">foto.jpg</div>
                                <div id="filesize-teacher" class="text-[10px] text-primary-200">0 KB</div>
                            </div>
                            <button type="button" id="remove-btn-teacher" class="p-1.5 rounded-lg bg-rose-600/40 hover:bg-rose-600 text-rose-100 transition shrink-0">
                                <i class="fa-solid fa-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-4 space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-primary-200 mb-1">Atau URL Gambar:</label>
                        <input type="text" name="photo" placeholder="https://..." class="w-full px-3 py-2 bg-[#9e6f54] border border-[#835841] rounded-xl text-base sm:text-xs text-white placeholder-primary/50 focus:outline-none focus:border-primary">
                    </div>
                    
                    <input type="hidden" name="order" value="{{ count($teachers) + 1 }}">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-primary hover:bg-primary-200 text-secondary-950 font-extrabold text-xs shadow-md transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-plus text-secondary"></i> Tambah Guru Sekarang
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Teachers Table -->
    <div class="bg-secondary text-white rounded-2xl border border-[#9e6f54] shadow-xl overflow-hidden">
        <div class="p-4 sm:p-6 border-b border-[#9e6f54] flex items-center justify-between">
            <h3 class="text-sm sm:text-base font-bold text-white">Daftar Guru & Staf ({{ count($teachers) }})</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-white whitespace-nowrap">
                <thead class="bg-[#9e6f54] text-primary uppercase font-bold border-b border-[#835841]">
                    <tr>
                        <th class="px-4 sm:px-6 py-3.5">Foto</th>
                        <th class="px-4 sm:px-6 py-3.5">Nama Guru</th>
                        <th class="px-4 sm:px-6 py-3.5">NIP</th>
                        <th class="px-4 sm:px-6 py-3.5">Jabatan</th>
                        <th class="px-4 sm:px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#835841]">
                    @forelse($teachers as $teacher)
                        <tr class="hover:bg-[#9e6f54]/50 transition">
                            <td class="px-4 sm:px-6 py-3">
                                <img src="{{ $teacher->photo ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop' }}" 
                                     alt="{{ $teacher->name }}" 
                                     class="w-10 h-10 rounded-full object-cover border border-primary/50">
                            </td>
                            <td class="px-4 sm:px-6 py-3 font-bold text-white">{{ $teacher->name }}</td>
                            <td class="px-4 sm:px-6 py-3 font-mono text-primary-200">{{ $teacher->nip ?? '-' }}</td>
                            <td class="px-4 sm:px-6 py-3 font-semibold text-primary">{{ $teacher->position }}</td>
                            <td class="px-4 sm:px-6 py-3 text-right">
                                <form action="{{ route('operator.teachers.delete', $teacher->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">
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
                            <td colspan="5" class="px-6 py-8 text-center text-primary-200">Belum ada data tenaga pendidik.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
    function setupTeacherDragDrop() {
        const dropzone = document.getElementById('dropzone-teacher');
        const fileInput = document.getElementById('file-teacher');
        const prompt = document.getElementById('prompt-teacher');
        const previewBox = document.getElementById('preview-box-teacher');
        const previewImg = document.getElementById('preview-img-teacher');
        const filenameElem = document.getElementById('filename-teacher');
        const filesizeElem = document.getElementById('filesize-teacher');
        const removeBtn = document.getElementById('remove-btn-teacher');

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

    setupTeacherDragDrop();
</script>

@endsection
