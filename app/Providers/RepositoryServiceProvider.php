<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PostRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\MyRepository;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
//            MyRepository::class
        );
    }
}
