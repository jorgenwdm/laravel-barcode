<?php

namespace Jorgenwdm\Barcode;

use Illuminate\Support\ServiceProvider;

class BarcodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {               
        $publishTag = 'laravel-barcode';       
        if (app() instanceof \Illuminate\Foundation\Application) {
            $this->publishes([
                __DIR__.'/config/laravel-barcode.php' => config_path('laravel-barcode.php'),
            ], $publishTag);
        }

    }
}