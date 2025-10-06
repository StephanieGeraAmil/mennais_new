<?php

namespace App\Http\Requests;

use App\Enums\InscriptionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class SimpleInscriptionRequest extends FormRequest
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
            // 'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user_data',
            'email' => 'required|email',
            'payment_file'=>'nullable|file|mimes:jpg,png,jpeg,gif,svg,pdf',
            'extra' => 'array', 
            'extra.place' => [ 
                Rule::in(['montevideo', 'interior'])
            ],
            'city'=>'string|max:255',
            'amount'=>'nullable|numeric',
            'institution_name'=>'string|max:255',
            'institution_type'=>'string|max:255',
            'type' =>  new Enum(InscriptionTypeEnum::class)
        ];
    }
    
    public function prepareForValidation()
    {
        $this->merge([
            'document' => str_replace([',','-','.',' '], '',$this->document),
        ]);
    }


    public function messages()
    {
        return [
            'document.unique' => 'Este documento ya se encuentra registrada. Si aún no recibió el email de confirmación, comuníquese con AUDEC.',
        ];
    }
    
    
}
