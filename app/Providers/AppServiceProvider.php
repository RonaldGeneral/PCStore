<?php

namespace App\Providers;

use App\Observers\EmailObserver;
use App\Observers\MessageObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use App\Models\Order;

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
        Model::preventSilentlyDiscardingAttributes(! $this->app->isProduction());
        Paginator::useBootstrapFive();
        Order::observe([MessageObserver::class, EmailObserver::class]);
    }
}
