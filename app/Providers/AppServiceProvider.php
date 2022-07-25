<?php

namespace App\Providers;

use App\Domain\Training\Services\TrainingService;
use App\Domain\Training\TrainingRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $modules = [
        "training" => [
            "service" => TrainingService::class,
            "repository" => TrainingRepository::class
        ]
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->modules as $module) {
            $this->app->singleton($module->repository, function ($app) use ($module) {
                return new $module->repository();
            });

            $this->app->singleton($module->service, function ($app) use ($module) {
                return new $module->service();
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
