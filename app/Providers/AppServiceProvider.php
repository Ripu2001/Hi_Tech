<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Blog;
use View;

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
        $setting = Setting::where('status',1)->first();

        $blog_recents = Blog::orderby('id','desc')
                    ->take(3)
                    ->get();

        View::share(['setting'=>$setting,'blog_recents'=>$blog_recents]);
    }
}
