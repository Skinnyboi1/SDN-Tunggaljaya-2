-- ==============================================================================
-- DATABASE SCHEMA & POLICIES FOR SDN TUNGGALJAYA 2
-- SUPABASE POSTGRESQL + REALTIME + STORAGE SETUP
-- ==============================================================================

-- 1. PROFILES TABLE (Informasi Profil Sekolah)
create table if not exists public.profiles (
    id text primary key default 'main',
    name text not null default 'SD N TUNGGALJAYA 2',
    npsn text default '20600476',
    akreditasi text default 'B',
    vision text,
    mission jsonb default '[]'::jsonb,
    history text,
    student_count integer default 185,
    teacher_count integer default 12,
    class_count integer default 6,
    phone text default '(0253) 8812-901',
    email text default 'sdntunggaljaya2@gmail.com',
    address text default 'Kp. Cipining, Desa Tunggaljaya, Kec. Sumur, Kabupaten Pandeglang, Banten 42283',
    map_url text default 'https://maps.google.com/maps?q=Tunggaljaya+Sumur+Pandeglang&t=&z=14&ie=UTF8&iwloc=&output=embed',
    updated_at timestamptz default now()
);

-- 2. TEACHERS TABLE (Tenaga Pendidik & Kependidikan)
create table if not exists public.teachers (
    id uuid primary key default gen_random_uuid(),
    name text not null,
    nip text default '-',
    position text default 'Guru Kelas',
    photo text,
    "order" integer default 99,
    created_at timestamptz default now(),
    updated_at timestamptz default now()
);

-- 3. FACILITIES TABLE (Fasilitas & Sarana Sekolah)
create table if not exists public.facilities (
    id uuid primary key default gen_random_uuid(),
    name text not null,
    description text,
    image text,
    icon text default 'fa-building-circle-check',
    created_at timestamptz default now(),
    updated_at timestamptz default now()
);

-- 4. POSTS TABLE (Berita, Pengumuman & Informasi PPDB)
create table if not exists public.posts (
    id uuid primary key default gen_random_uuid(),
    title text not null,
    slug text not null unique,
    category text default 'Berita',
    excerpt text,
    content text,
    image text,
    is_published boolean default true,
    published_at timestamptz default now(),
    created_at timestamptz default now(),
    updated_at timestamptz default now()
);

-- 5. GALLERY TABLE (Dokumentasi Kegiatan Sekolah)
create table if not exists public.gallery (
    id uuid primary key default gen_random_uuid(),
    title text not null,
    category text default 'Kegiatan',
    image text not null,
    created_at timestamptz default now(),
    updated_at timestamptz default now()
);

-- ==============================================================================
-- ROW LEVEL SECURITY (RLS) POLICIES
-- ==============================================================================

alter table public.profiles enable row level security;
alter table public.teachers enable row level security;
alter table public.facilities enable row level security;
alter table public.posts enable row level security;
alter table public.gallery enable row level security;

-- Public Read Access Policies (Semua pengunjung dapat melihat website)
drop policy if exists "Allow public read access on profiles" on public.profiles;
create policy "Allow public read access on profiles" on public.profiles for select using (true);

drop policy if exists "Allow public read access on teachers" on public.teachers;
create policy "Allow public read access on teachers" on public.teachers for select using (true);

drop policy if exists "Allow public read access on facilities" on public.facilities;
create policy "Allow public read access on facilities" on public.facilities for select using (true);

drop policy if exists "Allow public read access on posts" on public.posts;
create policy "Allow public read access on posts" on public.posts for select using (true);

drop policy if exists "Allow public read access on gallery" on public.gallery;
create policy "Allow public read access on gallery" on public.gallery for select using (true);

-- Authenticated (Operator) Write/Modify Policies (Hanya operator login yang bisa kelola)
drop policy if exists "Allow all for authenticated on profiles" on public.profiles;
create policy "Allow all for authenticated on profiles" on public.profiles for all using (auth.role() = 'authenticated' or auth.role() = 'service_role');

drop policy if exists "Allow all for authenticated on teachers" on public.teachers;
create policy "Allow all for authenticated on teachers" on public.teachers for all using (auth.role() = 'authenticated' or auth.role() = 'service_role');

drop policy if exists "Allow all for authenticated on facilities" on public.facilities;
create policy "Allow all for authenticated on facilities" on public.facilities for all using (auth.role() = 'authenticated' or auth.role() = 'service_role');

drop policy if exists "Allow all for authenticated on posts" on public.posts;
create policy "Allow all for authenticated on posts" on public.posts for all using (auth.role() = 'authenticated' or auth.role() = 'service_role');

drop policy if exists "Allow all for authenticated on gallery" on public.gallery;
create policy "Allow all for authenticated on gallery" on public.gallery for all using (auth.role() = 'authenticated' or auth.role() = 'service_role');

-- ==============================================================================
-- SUPABASE STORAGE: BUCKET 'school-media'
-- ==============================================================================

insert into storage.buckets (id, name, public) 
values ('school-media', 'school-media', true)
on conflict (id) do update set public = true;

-- Storage Policies
drop policy if exists "Public Access Storage" on storage.objects;
create policy "Public Access Storage" on storage.objects for select using (bucket_id = 'school-media');

drop policy if exists "Authenticated Upload Storage" on storage.objects;
create policy "Authenticated Upload Storage" on storage.objects for insert with check (bucket_id = 'school-media');

drop policy if exists "Authenticated Update Storage" on storage.objects;
create policy "Authenticated Update Storage" on storage.objects for update using (bucket_id = 'school-media');

drop policy if exists "Authenticated Delete Storage" on storage.objects;
create policy "Authenticated Delete Storage" on storage.objects for delete using (bucket_id = 'school-media');

-- ==============================================================================
-- REALTIME SUBSCRIPTIONS
-- ==============================================================================

do $$
begin
  if not exists (select 1 from pg_publication where pubname = 'supabase_realtime') then
    create publication supabase_realtime;
  end if;
end $$;

alter publication supabase_realtime add table public.profiles;
alter publication supabase_realtime add table public.teachers;
alter publication supabase_realtime add table public.facilities;
alter publication supabase_realtime add table public.posts;
alter publication supabase_realtime add table public.gallery;
