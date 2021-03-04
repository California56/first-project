<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public $shipping = 380;

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function getFullPrice(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function getPriceWithShipping(){
        return $this->getFullPrice() + $this->shipping;
    }

    public function saveOrder($name, $phone, $region, $city, $adress, $index){
        if($this->status == 0){
            if(Auth::check()){
                $this->user_id = Auth::id();
            }
            $this->name = $name;
            $this->phone = $phone;
            $this->region = $region;
            $this->city = $city;
            $this->adress = $adress;
            $this->index = $index;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

    public function makeOrderShipped($status, $track){
        if($this->status == 1){
            $this->status = $status;
            $this->track_number = $track;
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function orderStatus(){
        if($this->status >= 1){
            $arr = [
                '1' => 'В обработке',
                '2' => 'Отправлен',
                '3' => 'Доставлен'
                ];
    
            return $arr[$this->status];
        }
    }

    public function orderTrackNumber(){
        if($this->status == 2){
            return $this->track_number;
        } else {
            return '-';
        }
    }
}
