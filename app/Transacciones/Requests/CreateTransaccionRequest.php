<?php

namespace Transacciones\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaccionRequest extends FormRequest 
{
    
    public function response(array $errors)
    {
        return response()->json($errors, env('errorCuatrocientos'));
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mail'    => ['required'],
            'nombre'  => ['required'],
            'canttot' => ['required'],
            'tipoDoc' => ['required'],
            'nDoc'    => ['required'],
        ];
    }
}