<?php

namespace App\Providers;

use App\Models\Services\Skill_Two;
use Illuminate\Support\ServiceProvider;

class CustomeServiceProvicer extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind("skill_2",function(){
            return new Skill_Two();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
