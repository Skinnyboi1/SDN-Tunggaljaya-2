<?php

namespace App\Services;

use App\Models\Post;
use App\Models\SchoolProfile;
use App\Models\Teacher;
use App\Models\Facility;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use ZipArchive;

class StaticSiteExporter
{
    protected string $outputDir;

    public function __construct(?string $outputDir = null)
    {
        // Default to docs/ for native GitHub Pages support
        $this->outputDir = $outputDir ?? base_path('docs');
    }

    /**
     * Run the complete export process.
     *
     * @return array Summary of generated items
     */
    public function export(): array
    {
        // 1. Prepare target directory
        if (!File::exists($this->outputDir)) {
            File::makeDirectory($this->outputDir, 0755, true);
        } else {
            // Clean previous HTML and assets while keeping directory clean
            File::cleanDirectory($this->outputDir);
        }

        $generatedPages = [];

        // 2. Export Homepage (index.html)
        $homeHtml = $this->renderHomePage();
        File::put($this->outputDir . '/index.html', $homeHtml);
        $generatedPages[] = [
            'type' => 'Home Page',
            'url' => '/',
            'file' => 'index.html',
        ];

        // 3. Export News Detail Pages (/berita/{slug}/index.html & /berita/{slug}.html)
        $posts = Post::where('is_published', true)->get();
        foreach ($posts as $post) {
            $postHtmlSubdir = $this->renderNewsDetail($post, 2);
            $postHtmlSingle = $this->renderNewsDetail($post, 1);
            
            $postDir = $this->outputDir . '/berita/' . $post->slug;
            if (!File::exists($postDir)) {
                File::makeDirectory($postDir, 0755, true);
            }
            File::put($postDir . '/index.html', $postHtmlSubdir);
            
            // Also write single file for direct server routing fallback
            File::put($this->outputDir . '/berita/' . $post->slug . '.html', $postHtmlSingle);

            $generatedPages[] = [
                'type' => 'Berita / Pengumuman',
                'url' => '/berita/' . $post->slug,
                'file' => 'berita/' . $post->slug . '/index.html',
            ];
        }

        // 4. Copy Assets & Uploads
        $this->copyAssets();

        // 5. Create .nojekyll for GitHub Pages compatibility
        File::put($this->outputDir . '/.nojekyll', '');

        // 6. Generate 404.html fallback
        File::put($this->outputDir . '/404.html', $homeHtml);

        // 7. Generate meta summary info
        $summary = [
            'exported_at' => now()->format('d M Y, H:i:s') . ' WIB',
            'output_dir' => $this->outputDir,
            'pages_count' => count($generatedPages),
            'posts_count' => count($posts),
            'pages' => $generatedPages,
            'status' => 'success',
        ];

        File::put($this->outputDir . '/export-meta.json', json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // 8. If default docs/ was used, also mirror to dist/ for standard static hostings
        $distPath = base_path('dist');
        if ($this->outputDir === base_path('docs')) {
            if (!File::exists($distPath)) {
                File::makeDirectory($distPath, 0755, true);
            }
            File::copyDirectory($this->outputDir, $distPath);
        }

        return $summary;
    }

    /**
     * Render the Homepage.
     */
    protected function renderHomePage(): string
    {
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        $teachers = Teacher::orderBy('order', 'asc')->get();
        $facilities = Facility::all();
        $latestPosts = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();
        $galleries = Gallery::latest()->take(6)->get();

        $html = View::make('guest.index', compact('profile', 'teachers', 'facilities', 'latestPosts', 'galleries'))->render();

        return $this->optimizeStaticHtml($html, 0);
    }

    /**
     * Render News Detail Page.
     */
    protected function renderNewsDetail(Post $post, int $depth = 2): string
    {
        $recentPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(4)
            ->get();
        $profile = SchoolProfile::first() ?? new SchoolProfile();

        $html = View::make('guest.news-detail', compact('post', 'recentPosts', 'profile'))->render();

        return $this->optimizeStaticHtml($html, $depth);
    }

    /**
     * Copy public images, uploads, and static icons to dist directory.
     */
    protected function copyAssets(): void
    {
        $publicPath = public_path();

        // Copy images directory
        if (File::isDirectory($publicPath . '/images')) {
            File::copyDirectory($publicPath . '/images', $this->outputDir . '/images');
        }

        // Copy uploads directory
        if (File::isDirectory($publicPath . '/uploads')) {
            File::copyDirectory($publicPath . '/uploads', $this->outputDir . '/uploads');
        }

        // Copy js directory
        if (File::isDirectory($publicPath . '/js')) {
            File::copyDirectory($publicPath . '/js', $this->outputDir . '/js');
        }

        // Copy operator.html if exists
        if (File::exists($publicPath . '/operator.html')) {
            File::copy($publicPath . '/operator.html', $this->outputDir . '/operator.html');
        }

        // Copy login.html if exists
        if (File::exists($publicPath . '/login.html')) {
            File::copy($publicPath . '/login.html', $this->outputDir . '/login.html');
        }

        // Copy favicon if exists
        if (File::exists($publicPath . '/favicon.ico')) {
            File::copy($publicPath . '/favicon.ico', $this->outputDir . '/favicon.ico');
        }

        // Copy robots.txt if exists
        if (File::exists($publicPath . '/robots.txt')) {
            File::copy($publicPath . '/robots.txt', $this->outputDir . '/robots.txt');
        }
    }

    /**
     * Optimize and sanitize HTML for static serving with proper relative paths.
     */
    protected function optimizeStaticHtml(string $html, int $depth = 0): string
    {
        // 1. Strip domain/host prefix
        $html = str_replace(['http://localhost', 'https://localhost'], '', $html);

        // 2. Determine relative prefix based on folder depth
        $prefix = match($depth) {
            1 => '../',
            2 => '../../',
            default => './',
        };

        // 3. Replace asset paths (images, uploads, favicon, icons)
        $html = preg_replace('/src="\/images\//', 'src="' . $prefix . 'images/', $html);
        $html = preg_replace('/href="\/images\//', 'href="' . $prefix . 'images/', $html);
        $html = preg_replace('/src="\/uploads\//', 'src="' . $prefix . 'uploads/', $html);
        $html = preg_replace('/href="\/uploads\//', 'href="' . $prefix . 'uploads/', $html);
        $html = preg_replace('/href="\/favicon\.ico"/', 'href="' . $prefix . 'favicon.ico"', $html);

        // 4. Replace links and navigation anchors
        if ($depth === 0) {
            // Homepage root
            $html = preg_replace('/href="\/#([^"]*)"/', 'href="#$1"', $html);
            $html = preg_replace('/href="\/"/', 'href="./"', $html);
            $html = preg_replace('/href="\/berita\//', 'href="berita/', $html);
            $html = preg_replace('/href="\/login"/', 'href="#" title="Login Operator (Gunakan Server Lokal)"', $html);
        } else {
            // Subpages (e.g. berita/slug)
            $html = preg_replace('/href="\/#([^"]*)"/', 'href="' . $prefix . '#$1"', $html);
            $html = preg_replace('/href="\/"/', 'href="' . $prefix . '"', $html);
            $html = preg_replace('/href="\/berita\//', 'href="' . $prefix . 'berita/', $html);
            $html = preg_replace('/href="\/login"/', 'href="#" title="Login Operator (Gunakan Server Lokal)"', $html);
        }

        // 5. URL-encode spaces in local upload paths for strict web servers
        $html = preg_replace_callback('/(src|href)="(' . preg_quote($prefix, '/') . 'uploads\/[^"]+)"/', function ($matches) {
            $attr = $matches[1];
            $url = $matches[2];
            // Encode spaces but leave slashes intact
            $encodedUrl = str_replace(' ', '%20', $url);
            return $attr . '="' . $encodedUrl . '"';
        }, $html);

        return $html;
    }

    /**
     * Create a ZIP archive of the dist folder.
     *
     * @return string Absolute path to the generated zip file
     */
    public function createZipArchive(): string
    {
        $storageApp = storage_path('app');
        if (!File::exists($storageApp)) {
            File::makeDirectory($storageApp, 0755, true);
        }

        $zipFile = $storageApp . '/sdn-tunggaljaya-2-static.zip';

        if (File::exists($zipFile)) {
            File::delete($zipFile);
        }

        // Method 1: Use PHP native ZipArchive if extension is loaded
        if (class_exists(\ZipArchive::class)) {
            $zip = new \ZipArchive();
            if ($zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($this->outputDir, \RecursiveDirectoryIterator::SKIP_DOTS),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($this->outputDir) + 1);
                        $relativePath = str_replace('\\', '/', $relativePath);
                        $zip->addFile($filePath, $relativePath);
                    }
                }

                $zip->close();
                return $zipFile;
            }
        }

        // Method 2: Fallback to PowerShell Compress-Archive on Windows
        if (PHP_OS_FAMILY === 'Windows') {
            $psCommand = sprintf(
                'powershell -Command "Compress-Archive -Path \'%s\\*\' -DestinationPath \'%s\' -Force"',
                addslashes($this->outputDir),
                addslashes($zipFile)
            );
            exec($psCommand, $output, $returnCode);
            if ($returnCode === 0 && File::exists($zipFile)) {
                return $zipFile;
            }
        }

        // Method 3: Fallback to system zip on Unix/Linux
        if (function_exists('exec')) {
            $cmd = sprintf('cd %s && zip -r %s .', escapeshellarg($this->outputDir), escapeshellarg($zipFile));
            exec($cmd, $output, $returnCode);
            if ($returnCode === 0 && File::exists($zipFile)) {
                return $zipFile;
            }
        }

        throw new \RuntimeException('Tidak dapat membuat file ZIP. Pastikan ekstensi PHP zip diaktifkan atau gunakan folder dist/ langsung.');
    }

    /**
     * Get the current output directory.
     */
    public function getOutputDir(): string
    {
        return $this->outputDir;
    }
}
