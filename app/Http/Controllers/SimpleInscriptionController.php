<?php

namespace App\Http\Controllers;

use App\Http\Resources\SecondWorkshopGroupResource;
use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Models\FirstWorkshopGroup;
use App\Models\Inscription;
use App\Models\Institution;
use App\Models\Payment;
use App\Models\SecondWorkshopGroup;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SimpleInscriptionController extends Controller
{

    public function simpleInscription()
    {
        $first_workshop_groups = FirstWorkshopGroup::where('has_vacant', true)->get();        
        return view('inscription.simple')
        ->with('first_workshop_groups',$first_workshop_groups);
    }

    public function list_second_groups($first_workshop_group_id){
        $first_workshop_group = FirstWorkshopGroup::findOrFail($first_workshop_group_id);        
        $second_workshop_groups = SecondWorkshopGroup::where('school_id','!=', $first_workshop_group->school_id)->where('has_vacant',true)->get();
        return SecondWorkshopGroupResource::collection($second_workshop_groups);

    
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
            'first_workshop_group_id' => 'required|integer',
            'second_workshop_group_id' => 'required|integer',
            'amount' => 'required|integer',
            'payment_ref' => 'required|string|max:255',
            'payment_file'=>'required|file|mimes:jpg,png,jpeg,gif,svg,pdf',
        ]); 
        
        $first_workshop_group = FirstWorkshopGroup::findOrFail($validated_data['first_workshop_group_id']);
        $second_workshop_group = SecondWorkshopGroup::findOrFail($validated_data['second_workshop_group_id']);
    
        /**Chequear si no esta lleno. */
        
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
            'phone'=>$validated_data['phone']
        ]);
        
        
        /**
        * Create Inscription
        */
        $inscription = Inscription::create([
            'user_data_id'=>$user_data->id,
            'institution_id'=>$institution->id,
            'payment_id'=>$payment->id,
            'status'=>1,
            'first_workshop_group_id'=>$validated_data['first_workshop_group_id'],
            'second_workshop_group_id'=>$validated_data['second_workshop_group_id'],
        ]);

        $first_workshop_group->refresh_vacant();
        $second_workshop_group->refresh_vacant();
       
        
        Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));   
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminInscriptionMail($inscription));     

        session()->flash('msg', 'Inscripción realizada con exito!!!');
        return redirect('/simple_inscription');
    }


}
