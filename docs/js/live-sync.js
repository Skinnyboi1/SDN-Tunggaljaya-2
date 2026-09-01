import { supabase } from "./supabase-config.js";

// Initialize Fast Non-blocking Real-time Hydration for Website via Supabase
export function initLiveWebsite() {
    // 1. Live School Profile
    async function loadProfile() {
        try {
            const { data: p, error } = await supabase
                .from('profiles')
                .select('*')
                .eq('id', 'main')
                .maybeSingle();

            if (error || !p) return;

            const updateText = (selector, val) => {
                document.querySelectorAll(selector).forEach(el => {
                    if (val !== undefined && val !== null) el.innerText = val;
                });
            };

            updateText('.live-school-name', p.name);
            updateText('.live-school-npsn', `NPSN: ${p.npsn || '20600476'}`);
            updateText('.live-school-akreditasi', `Akreditasi: ${p.akreditasi || 'B'}`);
            updateText('.live-school-vision', p.vision);
            updateText('.live-school-history', p.history);
            updateText('.live-school-students', `${p.student_count || 185} Siswa`);
            updateText('.live-school-teachers', `${p.teacher_count || 12} Guru`);
            updateText('.live-school-classes', `${p.class_count || 6} Rombel`);
            updateText('.live-school-address', p.address);
            updateText('.live-school-phone', p.phone);
            updateText('.live-school-email', p.email);

            // Update Map Embed
            if (p.map_url) {
                document.querySelectorAll('.live-map-iframe').forEach(iframe => {
                    iframe.src = p.map_url;
                });
            }

            // Update Mission List
            let missions = p.mission;
            if (typeof missions === 'string') {
                try { missions = JSON.parse(missions); } catch(e) { missions = missions.split('\n').filter(Boolean); }
            }
            if (Array.isArray(missions) && missions.length > 0) {
                const missionContainer = document.getElementById('live-mission-container');
                if (missionContainer) {
                    missionContainer.innerHTML = missions.map((m, idx) => `
                        <div class="flex items-start gap-3 p-3.5 sm:p-4 rounded-xl bg-[#9e6f54] border border-[#835841]">
                            <span class="w-6 h-6 sm:w-7 sm:h-7 rounded-lg bg-primary text-secondary font-extrabold flex items-center justify-center shrink-0 text-xs shadow-xs">
                                ${idx + 1}
                            </span>
                            <p class="text-[#fdfbf9] text-xs sm:text-sm leading-relaxed font-medium pt-0.5">${m}</p>
                        </div>
                    `).join('');
                }
            }
        } catch (e) {
            console.warn('Profile fetch notice:', e);
        }
    }

    // 2. Live Teachers
    async function loadTeachers() {
        try {
            const { data: teachers, error } = await supabase
                .from('teachers')
                .select('*')
                .order('order', { ascending: true });

            if (error || !teachers || !teachers.length) return;

            const container = document.getElementById('live-teachers-container');
            if (container) {
                container.innerHTML = teachers.map(t => `
                    <div class="bg-secondary rounded-2xl border border-[#9e6f54] overflow-hidden flex flex-col justify-between shadow-md hover:border-primary transition">
                        <div class="p-5 sm:p-6 text-center space-y-3">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden mx-auto border-4 border-primary shadow-md">
                                <img src="${t.photo || './uploads/teachers/placeholder.jpg'}" 
                                     alt="${t.name}" 
                                     class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-white">${t.name}</h3>
                                <p class="text-xs font-semibold text-primary mt-1">${t.position}</p>
                            </div>
                        </div>
                        <div class="bg-[#9e6f54] px-4 py-2.5 border-t border-[#835841] text-xs text-primary-200 text-center font-mono">
                            <i class="fa-solid fa-id-card text-primary mr-1"></i> NIP: ${t.nip || '-'}
                        </div>
                    </div>
                `).join('');
            }
        } catch (e) {
            console.warn('Teachers fetch notice:', e);
        }
    }

    // 3. Live Facilities
    async function loadFacilities() {
        try {
            const { data: facilities, error } = await supabase
                .from('facilities')
                .select('*')
                .order('created_at', { ascending: false });

            if (error || !facilities || !facilities.length) return;

            const container = document.getElementById('live-facilities-container');
            if (container) {
                container.innerHTML = facilities.map(f => `
                    <div class="bg-secondary rounded-2xl border border-[#9e6f54] overflow-hidden shadow-md hover:border-primary transition flex flex-col justify-between">
                        <div>
                            <div class="h-44 sm:h-48 overflow-hidden bg-black/20">
                                <img src="${f.image || 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600'}" alt="${f.name}" class="w-full h-full object-cover hover:scale-105 transition transform duration-500">
                            </div>
                            <div class="p-5 sm:p-6 space-y-2">
                                <h3 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid ${f.icon || 'fa-building-circle-check'} text-primary"></i> ${f.name}
                                </h3>
                                <p class="text-xs text-[#fdfbf9] leading-relaxed">${f.description || ''}</p>
                            </div>
                        </div>
                    </div>
                `).join('');
            }
        } catch (e) {
            console.warn('Facilities fetch notice:', e);
        }
    }

    // 4. Live Posts / News
    async function loadPosts() {
        try {
            const { data: posts, error } = await supabase
                .from('posts')
                .select('*')
                .eq('is_published', true)
                .order('published_at', { ascending: false })
                .limit(3);

            if (error || !posts || !posts.length) return;

            const container = document.getElementById('live-posts-container');
            if (container) {
                container.innerHTML = posts.map(p => `
                    <article class="bg-secondary rounded-2xl border border-[#9e6f54] overflow-hidden flex flex-col justify-between shadow-md hover:border-primary transition">
                        <div>
                            <div class="relative h-48 overflow-hidden bg-black/20">
                                <img src="${p.image || 'https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600'}" alt="${p.title}" class="w-full h-full object-cover hover:scale-105 transition transform duration-500">
                                <div class="absolute top-3 left-3">
                                    <span class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold uppercase bg-[#3b2116] text-primary border border-[#6d4330] shadow-sm">${p.category || 'Berita'}</span>
                                </div>
                            </div>
                            <div class="p-5 sm:p-6 space-y-2.5">
                                <div class="flex items-center gap-2 text-[11px] text-primary font-semibold">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>${p.published_at ? new Date(p.published_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : '-'}</span>
                                </div>
                                <h3 class="text-base font-bold text-white leading-snug line-clamp-2 hover:text-primary transition">
                                    <a href="./berita.html?slug=${p.slug}">${p.title}</a>
                                </h3>
                                <p class="text-xs text-primary-100 line-clamp-3 leading-relaxed">${p.excerpt || ''}</p>
                            </div>
                        </div>
                        <div class="px-5 sm:px-6 pb-5 pt-2 border-t border-[#835841]">
                            <a href="./berita.html?slug=${p.slug}" class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:text-white transition">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </article>
                `).join('');
            }
        } catch (e) {
            console.warn('Posts fetch notice:', e);
        }
    }

    // 5. Live Gallery
    async function loadGallery() {
        try {
            const { data: galleries, error } = await supabase
                .from('gallery')
                .select('*')
                .order('created_at', { ascending: false })
                .limit(6);

            if (error || !galleries || !galleries.length) return;

            const container = document.getElementById('live-gallery-container');
            if (container) {
                container.innerHTML = galleries.map(g => `
                    <div class="group relative rounded-2xl overflow-hidden shadow-md border border-[#9e6f54] bg-[#9e6f54] aspect-square">
                        <img src="${g.image}" alt="${g.title}" class="w-full h-full object-cover group-hover:scale-110 transition transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4 text-white">
                            <span class="text-[10px] font-extrabold uppercase text-primary">${g.category || 'Kegiatan'}</span>
                            <h4 class="text-xs font-bold leading-tight mt-0.5">${g.title}</h4>
                        </div>
                    </div>
                `).join('');
            }
        } catch (e) {
            console.warn('Gallery fetch notice:', e);
        }
    }

    // Non-blocking async load (Executes in background immediately)
    setTimeout(() => {
        loadProfile();
        loadTeachers();
        loadFacilities();
        loadPosts();
        loadGallery();
    }, 0);

    // Setup Non-blocking Supabase Realtime Listener
    try {
        supabase.channel('public_live_updates')
            .on('postgres_changes', { event: '*', schema: 'public', table: 'profiles' }, () => loadProfile())
            .on('postgres_changes', { event: '*', schema: 'public', table: 'teachers' }, () => loadTeachers())
            .on('postgres_changes', { event: '*', schema: 'public', table: 'facilities' }, () => loadFacilities())
            .on('postgres_changes', { event: '*', schema: 'public', table: 'posts' }, () => loadPosts())
            .on('postgres_changes', { event: '*', schema: 'public', table: 'gallery' }, () => loadGallery())
            .subscribe();
    } catch (err) {
        console.warn('Supabase Realtime subscription notice:', err);
    }
}
