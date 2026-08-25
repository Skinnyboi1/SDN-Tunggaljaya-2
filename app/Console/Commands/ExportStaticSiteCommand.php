<?php

namespace App\Console\Commands;

use App\Services\StaticSiteExporter;
use Illuminate\Console\Command;

class ExportStaticSiteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:export {--output= : Custom output directory} {--zip : Also generate a ZIP archive}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ekspor seluruh website publik SDN Tunggaljaya 2 menjadi file HTML statis (dist/)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🚀 Memulai ekspor website statis SDN Tunggaljaya 2...');

        $customOutput = $this->option('output');
        $exporter = new StaticSiteExporter($customOutput);

        $this->comment('📁 Folder Output: ' . $exporter->getOutputDir());

        try {
            $summary = $exporter->export();

            $this->info('✅ Ekspor berhasil diselesaikan!');
            $this->table(
                ['Tipe Halaman', 'URL Asli', 'File Output Statis'],
                array_map(fn($p) => [$p['type'], $p['url'], $p['file']], $summary['pages'])
            );

            $this->line('');
            $this->info("📊 Total Halaman Digenerate: {$summary['pages_count']}");
            $this->info("🕒 Waktu Ekspor: {$summary['exported_at']}");

            if ($this->option('zip')) {
                $this->info('📦 Membuat file ZIP arsip...');
                $zipPath = $exporter->createZipArchive();
                $this->info("✅ File ZIP berhasil disimpan di: {$zipPath}");
            }

            $this->line('');
            $this->comment('💡 Seluruh file statis di dalam folder dist/ siap di-upload ke GitHub Pages, Vercel, Netlify, atau cPanel.');

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('❌ Terjadi kesalahan saat mengekspor situs statis: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
