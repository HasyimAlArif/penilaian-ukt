<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Redirect storage path to /tmp on Vercel (read-only filesystem)
        if (isset($_ENV['VERCEL']) || getenv('VERCEL')) {
            $storagePath = '/tmp/storage';

            // Create required directories
            $dirs = [
                $storagePath,
                $storagePath . '/app',
                $storagePath . '/app/public',
                $storagePath . '/framework',
                $storagePath . '/framework/cache',
                $storagePath . '/framework/cache/data',
                $storagePath . '/framework/sessions',
                $storagePath . '/framework/testing',
                $storagePath . '/framework/views',
                $storagePath . '/logs',
            ];

            foreach ($dirs as $dir) {
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
            }

            $this->app->useStoragePath($storagePath);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (isset($_ENV['VERCEL']) || getenv('VERCEL')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
