<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Order;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;


class MainController extends Controller
{
    public function index(){
        $products = Product::paginate(6);

        return view('content/home', compact('products'));
    }

    public function category($id){
        $category = Category::where('id', $id)->first();

        if (!is_null($category)){
            $products = $category->products()->paginate(9);
            return view('content/category', compact('category', 'products'));
        } else {
            return view('errors.404');
        }        
    }

    public function product($category, $product){
        $category = Category::where('id', $category)->first();
        if (!is_null($category)){
            $product = Product::where('category_id', $category->id)->where('id', $product)->first();
            if(!is_null($product)){
                return view('content/product', compact('category', 'product'));
            }else {
                return view('errors.404');
            }
        } else {
            return view('errors.404');
        }
    }

    public function toOrder(){
        return view('content/toOrder');
    }

    public function payment(){
        return view('content/payment');
    }

    public function reviews(){
        // $reviews = Review::paginate(7);
        $reviews = Review::latest()->paginate(7);

        return view('content/reviews', compact('reviews'));
    }

    public function sendReview(ReviewRequest $request) {
        $params = $request->all();
        Review::create($params);

        session()->flash('review-success', 'Ваш отзыв добавлен. Благодарим за обратную связь!');
       return back();
    }
}