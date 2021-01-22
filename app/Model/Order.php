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

    public static function regions(){
        return [
            'Алтайский край',
            'Амурская область',
            'Архангельская область',
            'Астраханская область',
            'Белгородская область',
            'Брянская область',
            'Владимирская область',
            'Волгоградская область',
            'Воронежская область',
            'Еврейская АО',
            'Забайкальский край',
            'Ивановская область',
            'Иркутская область',
            'Калининградская область',
            'Калужская область',
            'Камчатский край',
            'Карачаево-Черкеcсия',
            'Кемеровская область',
            'Кировская область',
            'Костромская область',
            'Краснодарский край',
            'Красноярский край',
            'Курганская область',
            'Курская область',
            'Ленинградская область',
            'Липецкая область',
            'Магаданская область',
            'Мурманская область',
            'Ненецкий АО',
            'Нижегородская область',
            'Новгородская область',
            'Новосибирская область',
            'Омская область',
            'Оренбургская область',
            'Орловская область',
            'Пензенская область',
            'Пермский край',
            'Приморский край',
            'Псковская область',
            'Республика Адыгея',
            'Республика Алта',
            'Республика Башкортостан',
            'Республика Бурятия',
            'Республика Дагестан',
            'Республика Ингушетия',
            'Республика Кабардино-Балкария',
            'Республика Калмыкия',
            'Республика Карелия',
            'Республика Коми',
            'Республика Крым',
            'Республика Марий Эл',
            'Республика Мордовия',
            'Республика Саха',
            'Республика Северная Осетия',
            'Республика Татарстан',
            'Республика Тыва',
            'Республика Хакасия',
            'Ростовская область',
            'Рязанская область',
            'Санкт-Петербург',
            'Саратовская область',
            'Сахалинская область',
            'Свердловская область',
            'Смоленская область',
            'Ставропольский край',
            'Тамбовская область',
            'Тверская область',
            'Томская область',
            'Тульская область',
            'Тюменская область',
            'Удмуртская Республика',
            'Ульяновская область',
            'Хабаровский край',
            'Ханты-Мансийский АО',
            'Челябинская область',
            'Чеченская Республика',
            'Чувашская Республика',
            'Чукотский АО',
            'Ямало-Ненецкий АО',
            'Ярославская область',
        ];
    }
}
