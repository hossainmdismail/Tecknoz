<?php

namespace App\Providers;

use App\Support\FrontendSeo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->scoped(FrontendSeo::class);
    }
}
