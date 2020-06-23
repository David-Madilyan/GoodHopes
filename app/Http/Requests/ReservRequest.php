<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservRequest extends FormRequest
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
      return [
        'username' => 'required|max:150',
        'count' => 'required|max:10',
        'email' => 'required|max:150',
        'type' => 'required|max:10',
        'phone' => 'required|max:50',
        'arrival' => 'required|max:50',
        'depart' => 'required|max:50'
      ];
    }

    public function messages(){
        return [
            'username.required' => 'Поле "ФИО" является обязательным.',
            'username.max' => 'Максимальная длина ФИО 150 символов.',
            'count.required' => 'Поле "количество персон" является обязательным.',
            'count.max' => 'Максимальное количество персон равно 10.',
            'email.required' => 'Поле "Email" является обязательным.',
            'email.max' => 'Максимальная длина Email 150 символов.',
            'type.required' => 'Необходимо выбрать тип комнаты.',
            'type.max' => 'Превышено допустимое число комнат.',
            'phone.required' => 'Необходимо ввести номер телефона.',
            'phone.max' => 'Максимальная длина "Номер телефона" 50 символов.',
            'arrival.required' => 'Необходимо ввести дату заезда.',
            'arrival.max' => 'Максимальная длина для поля "Заезд" 50 символов',
            'depart.required' => 'Необходимо ввести дату отъезда.',
            'depart.max' => 'Максимальная длина для поля "Отъезд" 50 символов',
        ];
    }
}
