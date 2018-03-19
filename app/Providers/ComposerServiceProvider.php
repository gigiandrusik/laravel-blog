<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\StatisticComposer;

/**
 * Class ComposerServiceProvider
 *
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*', StatisticComposer::class
        );
    }
}