<?php

namespace App\Providers;

use App\Interfaces\ModuleContentRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\PagesRepositoryInterface;

use App\Repositories\ModuleContentRepository;
use App\Repositories\UserRepository;
use App\Repositories\PagesRepository;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    $this->app->bind(ModuleContentRepositoryInterface::class, ModuleContentRepository::class);
    $this->app->bind(PagesRepositoryInterface::class, PagesRepository::class);
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    Paginator::useTailwind();
  }
}
