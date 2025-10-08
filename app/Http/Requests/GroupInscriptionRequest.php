<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupInscriptionRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'institution' => 'required|string|max:255',            
            // 'city' => 'required|string|max:255',
            'amount' => 'required|integer',
            'payment_file'=>'required|file|mimes:jpg,png,jpeg,gif,svg,pdf',
            'quantity_remote'=> 'required|integer',
            'quantity_hybrid'=> 'required|integer',
        ];
    }
}
