<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $forms = [
            'Enrollment'
        ];
        foreach ($forms as $form) {
            $this->app->bind("App\Helpers\Forms\Contracts\\{$form}FormHelper",
                "App\Helpers\Forms\\{$form}FormHelperImpl");
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
