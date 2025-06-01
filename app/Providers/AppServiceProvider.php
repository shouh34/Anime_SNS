<?php

namespace App\Providers;

use Anitime;
use App\Services\AniInfomations;
use App\Services\Animation;
use App\Services\AnitimeGenerate; // ← この use がない or 間違っている
use App\Services\GeoCoderInterface;
use App\Services\NominatimGeoCoder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //


        $this->app->bind(GeoCoderInterface::class, NominatimGeoCoder::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
