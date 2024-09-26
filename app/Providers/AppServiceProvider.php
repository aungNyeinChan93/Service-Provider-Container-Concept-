<?php

namespace App\Providers;

use App\Models\Services\Skill_One;
use App\Models\Services\Skill_Two;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //skill-1
        $this->app->bind("skill_1",function(){
            return new Skill_One;
        });

        //skill-2
        $this->app->singleton("skill_2",function(){
            return new Skill_Two;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
