<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
use App\Http\Requests\BasketConfirmRequest;

class BasketController extends Controller
{
    public function basket(){

        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        } else {
            $order = null;
        }

        return view('content/basket', compact('order'));
    }

    public function basketAdd($productId){
        $categoryList = Category::get();
        $orderId = session('orderId');

        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId'=>$order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if(!is_null($order)){
            if($order->products->contains($productId)){
                $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
                $pivotRow->count++;
                $pivotRow->update();
            } else {
                $order->products()->attach($productId);
            }
        }
        
        $product = Product::find($productId);
        session()->flash('basketAdd-success','Товар "'. $product->name . '"');
        return back();
    }

    // Удаляет 1 единицу товара из корзины.
    public function basketRemove($productId){
        $categoryList = Category::get();
        $orderId = session('orderId');
        
        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }   
        }
        
        return redirect()->route('basket');
    }

    // Удаляет все еденицы товара из корзины.
    public function basketDelete($productId){
        $orderId = session('orderId');

        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        
        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $order->products()->detach($productId);
        }
        
        return redirect()->route('basket');

    }

    // Обрабатывает страницу оформления заказа.
    public function basketOrder(){
        // $regions = Order::regions();

        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);

        return view('content/order', compact('order'));
    }

    // Собственно оформляет заказ.
    public function basketConfirm(BasketConfirmRequest $request){
        $orderId = session('orderId');

        if (is_null($orderId)){
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->userName, $request->userPhone, $request->userRegion, $request->userCity, $request->userAdress, $request->userIndex);
        
        // if ($success){
        //     session()->flash('success', 'Ваш заказ принят в обработку!');
        //     Mail::to('mr.sanchak@mail.ru')->send(new OrderCreated());
        // } else {
        //     session()->flash('warning', 'Случилась ошибка!');
        // }

        return redirect()->route('basket-empty');
    }

    public function basketEmpty() {

        return view('content/emptyBasket');
    }
}