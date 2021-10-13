<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'User',
            'StudentDetail',
            'ParentDetail',
            'ExamHistory',
            'Supporter',
            'Enrollment',
            'HighSchool',
            'Form',
            'Scholarship',
            'Invoice',
            'Sibling',
            'Township',
            'AppliedCourse',
            'Course',
            'Role'
        ];
        foreach ($models as $model) {
            $this->app->bind("App\Repositories\Contracts\\{$model}Repository",
                "App\Repositories\\{$model}RepositoryImpl");
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
