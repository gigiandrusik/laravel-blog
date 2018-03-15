<?php

namespace App\Providers;

use App\Models\Db\Post;
use App\Models\Db\Category;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserveServiceProvider
 *
 * @package App\Providers
 */
class ObserveServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
    }

}
