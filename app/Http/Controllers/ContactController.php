<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new ContactMail($validated_data['name'],$validated_data['email'],$validated_data['phone'],$validated_data['message']));
        } catch (\Throwable $th) {
            Log::error("ConatctEmail");
        }         
        session()->flash('success_contact', 'Mensaje enviado correctamente!!!');
        return redirect('/');
    }
}
