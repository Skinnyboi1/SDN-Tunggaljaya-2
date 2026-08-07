<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Post;
use App\Models\Gallery;

class GuestProfileController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        $teachers = Teacher::orderBy('order', 'asc')->get();
        $facilities = Facility::all();
        $latestPosts = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();
        $galleries = Gallery::latest()->take(6)->get();

        return view('guest.index', compact('profile', 'teachers', 'facilities', 'latestPosts', 'galleries'));
    }

    public function newsDetail($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recentPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(4)
            ->get();
        $profile = SchoolProfile::first() ?? new SchoolProfile();

        return view('guest.news-detail', compact('post', 'recentPosts', 'profile'));
    }
}
