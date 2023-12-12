<?php

namespace App\Http\Requests;

use App\Enums\InscriptionTypeEnum;
use App\Models\Code;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SendInscriptionRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        $type = $this->type;
        return [
            'email' => ['required','email', function ($attribute, $value, $fail) use ($type){
                if($type === null){
                    $fail('Falta tipo de invitación.');    
                    return;
                }
                if(Code::Where('email', $value)->where('type', $type)->count() > 0){
                    $fail('Ya existe una invitación en este modo para ese email.');    
                    return;
                }
            }
        ],
            'group_inscription_id' => 'required|integer',
            'type'=> ['required', new Enum(InscriptionTypeEnum::class) ]
        ];
    }
    

    
    
}
