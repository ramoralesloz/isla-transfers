<?php

use Illuminate\Support\Facades\Artisan;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

Artisan::call('view:clear');
Artisan::call('cache:clear');
Artisan::call('config:clear');
Artisan::call('route:clear');

echo "Caches cleared successfully";
