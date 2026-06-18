<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

        // Ensure /tmp/storage/framework/views exists for Vercel view compilation
        $viewsPath = '/tmp/storage/framework/views';
        if (!is_dir($viewsPath)) {
            mkdir($viewsPath, 0755, true);
        }
    }
}
