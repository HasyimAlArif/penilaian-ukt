<?php

// On Vercel, create /tmp/storage directories before Laravel boots
if (isset($_ENV['VERCEL']) || getenv('VERCEL')) {
    $storagePath = '/tmp/storage';
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
    $_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
    putenv("LARAVEL_STORAGE_PATH=$storagePath");
}

    require __DIR__ . '/../vendor/autoload.php';
    
    // Create writable bootstrap path
    $bootstrapPath = '/tmp/bootstrap';
    if (!is_dir($bootstrapPath . '/cache')) {
        mkdir($bootstrapPath . '/cache', 0755, true);
    }
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    
    // Use writable bootstrap path to avoid read-only error and stale cache
    $app->useBootstrapPath($bootstrapPath);
    
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );

    $response->send();

    $kernel->terminate($request, $response);
?>