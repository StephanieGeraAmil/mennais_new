<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupCodeUseRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'code' => 'required|string|exists:codes,code',
            'inscription_id' => 'required|integer|exists:inscriptions,id',
            'type' => 'required|in:hybrid,virtual', 
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Debe proporcionar un código válido.',
            'code.exists' => 'El código no existe.',
            'inscription_id.required' => 'Debe proporcionar la inscripción correspondiente.',
            'type.in' => 'El tipo debe ser "completo" o "virtual".',
        ];
    }
}
