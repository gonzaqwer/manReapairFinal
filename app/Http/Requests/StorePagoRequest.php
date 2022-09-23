<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePagoRequest extends FormRequest
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
        $date = Carbon::now();
        $mes = $date->month;
        $ano = $date->year;
        $ano = substr($ano, -2);
        return [
            'numeroTarjeta'=>'required|numeric|digits_between:13,18',
            'nombreTitular'=> 'required|regex:/^[\pL\s\-]+$/u',
            'mes'=> 'required|numeric|digits:2|min:'.$mes.'|max:12',
            'año'=> 'required|numeric|digits:2|min:'.$ano.'|max:30',
            'cvv'=> 'required|numeric|digits_between:3,4',
            'dni' => 'required|numeric|digits_between:7,8',
            'correoElectronico'=>'required|email'
        ];
    }
}
