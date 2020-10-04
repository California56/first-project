<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:3|max:255|unique:products,name',
            'weight' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'description' => 'required'
        ];

        if($this->route()->named('products.update')){
            $rules['name'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages(){
        $rules = [
            'required' => 'Поле обязательно для ввода!',
            'min' => 'Минимальное значение - 1!',
            'description.min' => 'Минимальное количество символов - 5!',
            'unique' => 'Такой товар уже существует!'
        ];

        return $rules;
    }
}
