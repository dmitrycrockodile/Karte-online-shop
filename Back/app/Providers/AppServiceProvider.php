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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Query's Logger
        // \Illuminate\Support\Facades\DB::beforeExecuting(function ($query, $params) {
        //     echo '<div>';
        //     var_dump($query);
        //     var_dump($params);
        //     echo '<hr>';
        //     echo '</div>';
        // });
    }
}
