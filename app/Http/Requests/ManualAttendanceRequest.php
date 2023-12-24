<?php

namespace App\Http\Requests;

use App\Enums\InscriptionTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ManualAttendanceRequest extends FormRequest
{
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        
        return [
            'acreditation_date' => 'required|date',
            'inscription_id' => 'required|integer',
            'type' => ['required', new Enum(InscriptionTypeEnum::class)]
        ];
    }
}
