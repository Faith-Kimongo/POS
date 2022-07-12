<?php

namespace App\Providers;

use App\Cart;
use App\User;
use App\Branch;
use Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {


            //Active Logins
            $cart =Cart::where('session_id', Session::getId())->get();
            $hotel=Branch::find(Session::get('branch'));
            // $loginscounts=$logins->count();

            $view->with(['carts'=>$cart,'hotel'=>$hotel]);

        });
    }
}
