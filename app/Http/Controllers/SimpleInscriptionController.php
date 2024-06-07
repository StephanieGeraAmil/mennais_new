<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimpleInscriptionRequest;
use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Models\Inscription;
use App\Models\Payment;
use App\Models\UserData; 
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SimpleInscriptionController extends Controller
{
    
    public function simpleInscription()
    {
        return view('inscription.simple');
    }
    
    
    
    public function simpleInscriptionStore(SimpleInscriptionRequest $request)
    {
    //  dd($request->all());
        $validated_data = $request->validated();
        // dd($validated_data);
        $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
        $image_name = Carbon::now()->format('dmyHis')."_".$clean_name.".".$request->payment_file->extension();
        $request->payment_file->move(public_path('images'),$image_name);        
        
        $payment = Payment::create([
            'url_payment'=>"/images/".$image_name,
            'amount_deposited'=>$validated_data['amount'] ?? 0,
            'reference'=>$validated_data['payment_ref'] ?? ""
        ]);
         
        
        $user_data = UserData::create([
            'name'=>$validated_data['name'],
            'document'=>Arr::get($validated_data, "document"),
            'email'=>$validated_data['email'],
            'extra' => isset($validated_data['extra']) ? json_encode($validated_data['extra']) : json_encode([]),
            'institution_name'=>$validated_data['institution_name'],
            'institution_type'=>$validated_data['institution_type'],
        ]);
        
        
        /**
        * Create Inscription
        */
        $inscription = Inscription::create([
            'user_data_id'=>$user_data->id,
            'payment_id'=>$payment->id,
            'status'=>1,
            // 'type'=>Arr::get($validated_data,"type")
            'type' => 'hibrido',
        ]);
        try {
            Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));   
            Mail::to(env('ADMIN_EMAIL', "cgerauy@gmail.com"))->send(new AdminInscriptionMail($inscription));     
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("SimpleInscriptionController::Email: ".$user_data->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }        
        
        session()->flash('msg', 'Inscripción realizada con exito!!!');
        return redirect('/simple_inscription');
    }
    
    
}
