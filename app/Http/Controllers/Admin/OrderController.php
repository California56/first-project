<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function newOrders() {
        $orders = Order::where('status',1)->paginate(10);
        return view('auth.orders.newOrders', compact('orders'));
    }

    public function oldOrders(){
        $orders = Order::where('status', 2)->paginate(10);
        return view('auth.orders.oldOrders', compact('orders'));
    }

    public function show(Order $order) {
        return view('auth.orders.show', compact('order'));
    }

    public function changeOrder(Order $order,Request $request) {
        $success = $order->makeOrderShipped($request->order_status, $request->track_number);
        return redirect()->route('home');
    }

    public function destroy(Order $order){
        $order->delete();
        return back();
    }

    public function cabinet(){
        if(Auth::check()){
            $user_id = Auth::id();
            $orders = Order::where('user_id', $user_id)->get();
        }

        return view('content/cabinet', compact('orders'));
    }
}
