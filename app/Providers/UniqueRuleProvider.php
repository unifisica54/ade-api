<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UniqueRuleInterface;
use App\Services\UniqueRuleService;
class UniqueRuleProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UniqueRuleInterface::class, UniqueRuleService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
