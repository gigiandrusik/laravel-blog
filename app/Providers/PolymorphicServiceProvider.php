<?php

namespace App\Providers;

use App\Models\Db\Post;
use App\Models\Db\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * Class PolymorphicServiceProvider
 *
 * @package App\Providers
 */
class PolymorphicServiceProvider extends ServiceProvider
{
    /**
     *@return void
     */
    public function boot()
    {
        Relation::morphMap([
            'category' => Category::class,
            'post'     => Post::class,
        ]);
    }
}