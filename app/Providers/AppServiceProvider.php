<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\V2\AdvocacyComplains\AdvocacyTable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Livewire::component('v2.advocacy-complains.advocacy-table', AdvocacyTable::class);
        Paginator::useBootstrap();
    }
}
