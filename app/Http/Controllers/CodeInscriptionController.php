<?php

namespace App\Http\Controllers;

use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Models\Code;
use App\Models\Inscription;
use App\Models\Institution;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CodeInscriptionController extends Controller
{
    
    public function codeInscription($id, $group_inscription_id,$code){
        $i_code = Code::findOrFail($id);               
        if(!$i_code->validCode($group_inscription_id,$code)){
            abort('403');
        }
        if($i_code->status > 1){
            return redirect('/');
        }
        return view('inscription.code')
        ->with('code',$i_code)
        ->with('institution',$i_code->groupInscription->institution);
    }


    public function codeInscriptionStore(Request $request){
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user_data',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'code' => 'required|integer',
        ]); 
        
        $document = str_replace([',','-','.',' '], '',$validated_data['document']);

        /**
        * Get code
        */
        $code = Code::findOrFail($validated_data['code']);
        $group_inscription = $code->groupInscription;
        
        
        
        /**
        * Create Institution
        */
        //Check institution and change.
        $institution_stored = $group_inscription->institution;
        $create = true;
        if($institution_stored->institution == $validated_data['institution_name']){
            if($institution_stored->city == $validated_data['city']){
                $create = false;
                $institution = $institution_stored;                    
            }
        }
        if($create){
            $institution = Institution::create([
                'institution'=>$validated_data['institution_name'],
                'city'=>$validated_data['city']
            ]);
        }
        
        /**
        * Create UserData
        */
        $user_data = UserData::create([
            'name'=>$validated_data['name'],
            'lastname'=>$validated_data['lastname'],
            'document'=>$document,
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone'],
        ]);
        
        
        /**
        * Create Inscription
        */
        $inscription = Inscription::create([
            'user_data_id'=>$user_data->id,
            'institution_id'=>$institution->id,
            'payment_id'=>$group_inscription->payment_id,
            'status'=>1
        ]);

        $code->status = 2;
        $code->inscription_id = $inscription->id;
        $code->save();
        
        Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminInscriptionMail($inscription));

        session()->flash('msg', 'Inscripción realizada con exito!!!');
        return redirect('/simple_inscription');        
    }


   

}
