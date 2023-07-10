<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CodeInscriptionRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user_data',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'extra' => 'required|array',
            'code' => 'required|integer',
        ];
    }
}
