<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketConfirmRequest extends FormRequest
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
        return  [
            'userName' => 'required|min:3|max:255',
            'userPhone' => 'required|min:10|max:255',
            'userCity' => 'required|min:3|max:255',
            'userRegion' => 'required|min:3|max:255',
            'userAdress' => 'required|min:3|max:255',
            'userIndex' => 'required|min:6|max:255'
        ];
    }

    public function messages(){
        return [
            'required' => 'Поле обязательно для ввода',
            'userName.required' => 'Введите Ф.И.О',
            'userPhone.required' => 'Ведите номер телефона',
            'userPhone.min' => 'Минимальное количество символов - 10',
            'userCity.required' => 'Bведите город',
            'userRegion.required' => 'Выберите область',
            'userAdress.required' => 'Введите адрес',
            'userIndex.required' => 'Введите индекс',
            'userIndex.min' => 'Мин. количестов символов - 6',
            'max' => 'Превышен допустимый лимит ввода симоволов',
            'min' => 'Полученное значение меньше минимального значения символов'
        ];
    }
}
