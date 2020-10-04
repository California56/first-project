<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Category;
use App\Model\Order;

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

    // Передает некоторые переменные сразу всем представлениям.
    public function boot()
    {   
        view()->share('categoryList', Category::get());
        view()->composer('*', function ($view) 
        {   
            
            $orderId = session('orderId');
            if(!is_null($orderId)){
                $order = Order::findOrFail($orderId);
                $products = $order->products;
                $sum = 0;
        
                foreach($products as $product){
                    $count = $product->pivot->count;
                    $sum += $count;
                }
            } else {
                $sum = 0;
            }
            $view->with('cartQuantity', $sum );    
        });  
    }
}
