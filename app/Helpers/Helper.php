
<?php

use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Car;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Category;
use App\Models\Blog;

if (!function_exists('getBrands')) {
    function getBrands()
    {
        return Brand::withCount('cars')->get();
    }
}

if (!function_exists('getModels')) {
    function getModels()
    {
        return CarModel::all();
    }
}

if (!function_exists('getCars')) {
    function getCars()
    {
        return Car::with(['brand', 'model', 'version', 'images'])->get();
    }
}
if (!function_exists('getLatestCars')) {
    function getLatestCars($limit = 6)
    {
        return Car::with(['brand', 'model', 'images'])
            ->where('status', 'active')
            ->latest('created_at')
            ->take($limit)
            ->get();
    }
}

if (!function_exists('getTopBrandsWithCars')) {
    /**
     * Get top 5 brands with most cars and their cars
     *
     * @param int $limit Number of brands to return
     * @param int $carsPerBrand Number of cars per brand to return
     * @return \Illuminate\Support\Collection
     */
    function getTopBrandsWithCars($limit = 5, $carsPerBrand = 6)
    {
        return Brand::withCount('cars')
            ->having('cars_count', '>', 0)
            ->orderBy('cars_count', 'desc')
            ->take($limit)
            ->with(['cars' => function ($query) use ($carsPerBrand) {
                $query->with(['brand', 'model', 'version', 'images'])
                    ->where('status', 'active')
                    ->latest('created_at')
                    ->take($carsPerBrand);
            }])
            ->get();
    }
}

if (!function_exists('getCarsByBrand')) {
    /**
     * Get cars by specific brand ID
     *
     * @param int $brandId
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    function getCarsByBrand($brandId, $limit = 6)
    {
        return Car::with(['brand', 'model', 'version', 'images'])
            ->where('brand_id', $brandId)
            ->where('status', 'active')
            ->latest('created_at')
            ->take($limit)
            ->get();
    }
}


if (! function_exists('site_settings')) {
    /**
     * Get global site settings and social links
     *
     * @return array
     */
    function site_settings()
    {
        return Cache::remember('site_settings', 60 * 60, function () {
            $settings = Setting::first();
            $socialLinks = SocialLink::all();

            return [
                'settings'     => $settings,
                'social_links' => $socialLinks,
            ];
        });
    }


    if (!function_exists('getTopBlogCategories')) {
        /**
         * Get top 6 blog categories with at least 1 blog
         *
         * @param int $limit
         * @return \Illuminate\Support\Collection
         */
        function getTopBlogCategories($limit = 6)
        {
            return Category::all()
                ->map(function ($category) {
                    $category->blogs_count = Blog::whereJsonContains('category_ids', $category->id)->count();
                    return $category;
                })
                ->filter(fn($cat) => $cat->blogs_count > 0)
                ->take($limit);
        }
    }
}
