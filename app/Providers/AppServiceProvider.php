<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\View;

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
        // Share service categories with all client views (or limit to layout if you want)
        View::composer('client.*', function ($view) {
            $serviceMenuCategories = ServiceCategory::with(['children' => function ($q) {
                    $q->where('status', true)
                      ->orderBy('sort_order')
                      ->orderBy('name');
                }])
                ->whereNull('parent_id')       // only main categories
                ->where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();
    
            $view->with('serviceMenuCategories', $serviceMenuCategories);
        });
    }
}
