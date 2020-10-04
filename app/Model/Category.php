<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category','description'];

    public static function getCategories(){

        $categories = DB::select('SELECT * FROM categories');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
