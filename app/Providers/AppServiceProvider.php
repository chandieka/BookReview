<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder; // Import Builder where defaultStringLength method is defined
use Illuminate\Support\Facades\Gate;


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
        Builder::defaultStringLength(191); // Update defaultStringLength

        Gate::define('edit-review', function($user, $review){
            return $user->id === $review->user_id;
        });

        Gate::define('delete-review', function($user, $review){
            return $user->id === $review->user_id && $user->isAdmin == 1;
        });
    }
}
