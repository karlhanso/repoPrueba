<?php

namespace Transacciones\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaccionRequest extends FormRequest 
{
    
    public function response(array $errors)
    {
        return response()->json($errors, 422);
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mail'   => ['required'],
            'nombre' => ['required']
        ];
    }
}