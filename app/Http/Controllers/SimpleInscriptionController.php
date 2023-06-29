<?php

namespace App\Http\Controllers;

use App\Http\Requests\SimpleInscriptionRequest;
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
    
    
    
    public function simpleInscriptionStore(SimpleInscriptionRequest $request)
    {
        $validated_data = $request->validated();
        $document = str_replace([',','-','.',' '], '',$validated_data['document']);

        $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
        $image_name = Carbon::now()->format('dmyHis')."_".$clean_name.".".$request->payment_file->extension();
        $request->payment_file->move(public_path('images'),$image_name);        
        
        $payment = Payment::create([
            'url_payment'=>"/images/".$image_name,
            'amount_deposited'=>$validated_data['amount'],
            'reference'=>$validated_data['payment_ref']
        ]);
        
        $institution = Institution::where('institution', $validated_data['institution_name'])->where('city', $validated_data['city'])->first();
        if($institution === null){
            $institution = Institution::create([
                'institution'=>$validated_data['institution_name'],
                'city'=>$validated_data['city']
            ]);
        }
        
        $user_data = UserData::create([
            'name'=>$validated_data['name'],
            'lastname'=>$validated_data['lastname'],
            'document'=>$document,
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone']
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
        
        Mail::to($user_data->email)->queue(new FacetofaceInscriptionMail($inscription));   
        Mail::to(env('ADMIN_EMAIL'))->queue(new AdminInscriptionMail($inscription));     
        
        session()->flash('msg', 'Inscripción realizada con exito!!!');
        return redirect('/simple_inscription');
    }
    
    
}
