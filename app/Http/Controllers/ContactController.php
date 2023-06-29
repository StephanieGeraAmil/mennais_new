<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request){
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'message' => 'required|string'                        
        ]);         
        Mail::to(env('ADMIN_EMAIL'))->queue(new ContactMail($validated_data['name'],$validated_data['email'],$validated_data['phone'],$validated_data['message']));
        session()->flash('success_contact', 'Inscripción realizada con exito!!!');
        return redirect('/');
    }
}
