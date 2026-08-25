<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Post;
use App\Models\Gallery;
use App\Services\StaticSiteExporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OperatorController extends Controller
{
    public function dashboard()
    {
        $teacherCount = Teacher::count();
        $facilityCount = Facility::count();
        $postCount = Post::count();
        $galleryCount = Gallery::count();

        $profile = SchoolProfile::first();
        $recentPosts = Post::latest()->take(5)->get();

        $metaPath = File::exists(base_path('docs/export-meta.json')) 
            ? base_path('docs/export-meta.json') 
            : base_path('dist/export-meta.json');
        $exportMeta = File::exists($metaPath) ? json_decode(File::get($metaPath), true) : null;

        return view('operator.dashboard', compact('teacherCount', 'facilityCount', 'postCount', 'galleryCount', 'profile', 'recentPosts', 'exportMeta'));
    }

    // --- School Profile Management ---
    public function profile()
    {
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        return view('operator.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'npsn' => 'nullable|string|max:50',
            'akreditasi' => 'nullable|string|max:50',
            'principal_name' => 'nullable|string|max:255',
            'principal_welcome' => 'nullable|string',
            'principal_photo' => 'nullable|string',
            'principal_photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission_text' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'map_url' => 'nullable|string',
            'student_count' => 'required|integer|min:0',
            'teacher_count' => 'required|integer|min:0',
            'class_count' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('principal_photo_file')) {
            $file = $request->file('principal_photo_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $filename);
            $data['principal_photo'] = '/uploads/profile/' . $filename;
        }
        unset($data['principal_photo_file']);

        if (!empty($data['mission_text'])) {
            $data['mission'] = array_filter(array_map('trim', explode("\n", $data['mission_text'])));
        } else {
            $data['mission'] = [];
        }
        unset($data['mission_text']);

        $profile = SchoolProfile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            SchoolProfile::create($data);
        }

        return redirect()->back()->with('success', 'Profil Sekolah SDN Tunggaljaya 2 berhasil diperbarui!');
    }

    // --- Teachers Management ---
    public function teachers()
    {
        $teachers = Teacher::orderBy('order', 'asc')->get();
        return view('operator.teachers.index', compact('teachers'));
    }

    public function storeTeacher(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|string',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('photo_file')) {
            $file = $request->file('photo_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/teachers'), $filename);
            $data['photo'] = '/uploads/teachers/' . $filename;
        }
        unset($data['photo_file']);

        Teacher::create($data);

        return redirect()->back()->with('success', 'Data tenaga pendidik berhasil ditambahkan!');
    }

    public function updateTeacher(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|string',
            'photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('photo_file')) {
            $file = $request->file('photo_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/teachers'), $filename);
            $data['photo'] = '/uploads/teachers/' . $filename;
        }
        unset($data['photo_file']);

        $teacher->update($data);

        return redirect()->back()->with('success', 'Data tenaga pendidik berhasil diperbarui!');
    }

    public function deleteTeacher(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->back()->with('success', 'Data tenaga pendidik telah dihapus.');
    }

    // --- Facilities Management ---
    public function facilities()
    {
        $facilities = Facility::all();
        return view('operator.facilities.index', compact('facilities'));
    }

    public function storeFacility(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'icon' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/facilities'), $filename);
            $data['image'] = '/uploads/facilities/' . $filename;
        }
        unset($data['image_file']);

        Facility::create($data);

        return redirect()->back()->with('success', 'Fasilitas baru berhasil ditambahkan!');
    }

    public function updateFacility(Request $request, Facility $facility)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'icon' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/facilities'), $filename);
            $data['image'] = '/uploads/facilities/' . $filename;
        }
        unset($data['image_file']);

        $facility->update($data);

        return redirect()->back()->with('success', 'Data fasilitas berhasil diperbarui!');
    }

    public function deleteFacility(Facility $facility)
    {
        $facility->delete();
        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }

    // --- Posts / News Management ---
    public function posts()
    {
        $posts = Post::latest()->get();
        return view('operator.posts.index', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'is_published' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/posts'), $filename);
            $data['image'] = '/uploads/posts/' . $filename;
        }
        unset($data['image_file']);

        $data['slug'] = Str::slug($data['title']) . '-' . rand(100, 999);
        $data['published_at'] = now();
        $data['author_id'] = auth()->id();
        $data['is_published'] = $request->has('is_published');

        Post::create($data);

        return redirect()->back()->with('success', 'Berita/Pengumuman baru berhasil diterbitkan!');
    }

    public function updatePost(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/posts'), $filename);
            $data['image'] = '/uploads/posts/' . $filename;
        }
        unset($data['image_file']);

        $data['is_published'] = $request->has('is_published');

        $post->update($data);

        return redirect()->back()->with('success', 'Berita/Pengumuman berhasil diperbarui!');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Berita/Pengumuman telah dihapus.');
    }

    // --- Gallery Management ---
    public function gallery()
    {
        $galleries = Gallery::latest()->get();
        return view('operator.gallery.index', compact('galleries'));
    }

    public function storeGallery(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/gallery'), $filename);
            $data['image'] = '/uploads/gallery/' . $filename;
        }

        if (empty($data['image'])) {
            return redirect()->back()->with('error', 'Silakan pilih file gambar dari PC atau masukkan link gambar.');
        }
        unset($data['image_file']);

        Gallery::create($data);

        return redirect()->back()->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function deleteGallery(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    // --- Static Site Export & Download ---
    public function exportStatic(StaticSiteExporter $exporter)
    {
        try {
            $summary = $exporter->export();
            return redirect()->back()->with('success', "Website statis berhasil diekspor! Total {$summary['pages_count']} halaman HTML & aset telah disimpan di folder docs/ (GitHub Pages ready) & dist/.");
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal mengekspor website statis: ' . $e->getMessage());
        }
    }

    public function downloadStaticZip(StaticSiteExporter $exporter)
    {
        try {
            $exporter->export();
            $zipPath = $exporter->createZipArchive();

            return response()->download($zipPath, 'sdn-tunggaljaya-2-static.zip');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal mengunduh file ZIP: ' . $e->getMessage());
        }
    }
}
