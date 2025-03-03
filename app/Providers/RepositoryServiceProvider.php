<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoriesInterface;
use App\Interfaces\TaskRepoitoriesInterface;
use App\Interfaces\UserRepositoriesInterface;
use App\Repositories\AuthRepositories;
use App\Repositories\TaskRepositories;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthRepositoriesInterface::class , AuthRepositories::class);
        $this->app->bind(TaskRepoitoriesInterface::class , TaskRepositories::class);
    
    }
}