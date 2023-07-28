<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeInscriptionRequest;
use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Models\Code;
use App\Models\Inscription;
use App\Models\UserData;
use Illuminate\Support\Facades\Log;
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


    public function codeInscriptionStore(CodeInscriptionRequest $request){
        
        $validated_data = $request->validated();
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
        
        
        /**
        * Create UserData
        */
        $user_data = UserData::create([
            'name'=>$validated_data['name'],
            'lastname'=>$validated_data['lastname'],
            'document'=>$document,
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone'],
            'extra'=>json_encode($validated_data['extra']) ?? json_encode([]),
        ]);
        
        
        /**
        * Create Inscription
        */
        $inscription = Inscription::create([
            'user_data_id'=>$user_data->id,
            'payment_id'=>$group_inscription->payment_id,
            'status'=>1
        ]);

        $code->status = 2;
        $code->inscription_id = $inscription->id;
        $code->save();
        try {
            Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminInscriptionMail($inscription));
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("AdminController::Email: ".$user_data->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }
        return redirect('/simple_inscription');        
    }


   

}
