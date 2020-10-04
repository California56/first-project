<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Order;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {   
        $orderId = session('orderId');

        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            
            if ($order->products->count() == 0) {
                return redirect()->route('basket-empty');
            } 
        } else {
            return redirect()->route('basket-empty');
        }
        return $next($request);
    }
}
