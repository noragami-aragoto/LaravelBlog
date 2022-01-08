<?php

namespace App\Providers;

use App\Repositories\EloquentBlogCategory;
use App\Repositories\EloquentBlogPost;
use App\Repositories\Interfaces\BlogCategoryRepositoryInterface;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;
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
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->singleton(BlogPostRepositoryInterface::class, EloquentBlogPost::class);
        $this->app->singleton(BlogCategoryRepositoryInterface::class, EloquentBlogCategory::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
