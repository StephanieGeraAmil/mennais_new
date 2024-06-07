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
            'document' => 'required|string|max:255|unique:user_data',
            'email' => 'required|email',
            'payment_file'=>'required|file|mimes:jpg,png,jpeg,gif,svg,pdf',
            'extra' => 'array', 
            'extra.place' => [ 
                Rule::in(['montevideo', 'interior'])
            ],
            'amount'=>'numeric',
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
    
    
}
