<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    
    $rol = session('rol');
    if ($rol == 2) {
      unset($verticalMenuData[5]);
    } else if ($rol == 3) {
      unset($verticalMenuData[4]);
    }
    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
  }
}
