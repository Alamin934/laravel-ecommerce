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

        $categories = \App\Models\Category::select(['name','slug'])->where('category_id', null)->get();
        view()->share('categories', $categories);
    }
}
