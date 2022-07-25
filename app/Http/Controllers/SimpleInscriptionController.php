<?php

namespace App\Http\Controllers;

use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Models\Inscription;
use App\Models\Institution;
use App\Models\Payment;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SimpleInscriptionController extends Controller
{

    public function simpleInscription()
    {
        return view('inscription.simple');
    }


    public function simpleInscriptionStore(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user_data',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'institution_type' => 'required|boolean',
            'city' => 'required|string|max:255',
            'function' => 'required|integer',
            'amount' => 'required|integer',
            'payment_ref' => 'required|string|max:255',
            'payment_file'=>'required|file|mimes:jpg,png,jpeg,gif,svg,pdf',
        ]); 
        
        
        /**
        * Create Payment
        */
        $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
        $image_name = Carbon::now()->format('dmyHis')."_".$clean_name.".".$request->payment_file->extension();
        $request->payment_file->move(public_path('images'),$image_name);        
        
        $payment = Payment::create([
            'url_payment'=>"/images/".$image_name,
            'amount_deposited'=>$validated_data['amount'],
            'reference'=>$validated_data['payment_ref']
        ]);
        
        
        /**
        * Create Institution
        */
        $institution = Institution::create([
            'institution'=>$validated_data['institution_name'],
            'is_formal_institution'=>$validated_data['institution_type'],
            'city'=>$validated_data['city']
        ]);
        
        /**
        * Create UserData
        */
        $user_data = UserData::create([
            'name'=>$validated_data['name'],
            'lastname'=>$validated_data['lastname'],
            'document'=>$validated_data['document'],
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone'],
            'function'=>$validated_data['function']
        ]);
        
        
        /**
        * Create Inscription
        */
        $inscription = Inscription::create([
            'user_data_id'=>$user_data->id,
            'institution_id'=>$institution->id,
            'payment_id'=>$payment->id,
            'status'=>1
        ]);
        
        Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));   
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminInscriptionMail($inscription));     

        session()->flash('msg', 'Inscripción realizada con exito!!!');
        return redirect('/simple_inscription');        
    }


}
