<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InterfaceCategoryRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\InterfaceCourseRepository;
use App\Repositories\CourseRepository;
use App\Repositories\InterfaceUserRepository;
use App\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind Interface to Implementation
        $this->app->bind(
            InterfaceCourseRepository::class,
            CourseRepository::class
        );

        $this->app->bind(
            InterfaceUserRepository::class,
            UserRepository::class
        );

        $this->app->bind(
            InterfaceCategoryRepository::class,
            CategoryRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
