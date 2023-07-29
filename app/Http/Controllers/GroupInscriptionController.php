<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupInscriptionRequest;
use App\Mail\AdminGroupInscriptionMail;
use App\Mail\GroupInscriptionMail;
use App\Models\Code;
use App\Models\GroupInscription;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GroupInscriptionController extends Controller
{
    public function groupInscription()
    {
        return view('inscription.group');
    }


    public function groupInscriptionStore(GroupInscriptionRequest $request)
    {
        $validated_data = $request->validated();
        
        /**
        * Create Payment
        */
        $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
        $image_name = Carbon::now()->format('dmyHis')."_".$clean_name.".".$request->payment_file->extension();
        $request->payment_file->move(public_path('images'),$image_name);        
        
        $payment = Payment::create([
            'url_payment'=>"/images/".$image_name,
            'amount_deposited'=>$validated_data['amount'] ?? 0,
            'reference'=>$validated_data['payment_ref'] ?? ""
        ]);
        
        
        /**
        * Create Grupal inscription
        */
        $code_group_insc = $this->codeGenerator();
        $group_inscription = GroupInscription::create([
            'name'=>$validated_data['name'],
            'email'=>$validated_data['email'],
            'phone'=>$validated_data['phone'],
            'quantity'=>$validated_data['quantity_insc'],
            'institution'=>$validated_data['extra']['institution'] ?? "",
            'payment_id'=>$payment->id,
            'code'=>$code_group_insc
        ]);
        
        /**
        * Create Codes
        */
        $codes = array();
        for ($i=0; $i < $validated_data['quantity_insc']; $i++) { 
            $code = $this->codeGenerator($i);
            $i_code = Code::create([
                'group_inscription_id'=>$group_inscription->id,
                'institution'=>$validated_data['extra']['institution']  ?? "",
                'code'=>$code,
                'inscription_id'=>0,
                'status'=>0,
                'email'=>""
            ]);
            array_push($codes,$i_code);
        }
        try {
            Mail::to($group_inscription->email)->send(new GroupInscriptionMail($group_inscription));
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("GroupInscriptionController::Email: ".$group_inscription->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }
        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminGroupInscriptionMail($group_inscription));
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("GroupInscriptionController::Email: ".$group_inscription->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }        
        return redirect($group_inscription->getUrl());        
    }


    private function codeGenerator($i = 15){
        $rand_code = rand(10,100);
        $date = date('YmdHis');
        $value = $rand_code + $date;
        $code = md5($i.":sk".$value.":".$date);
        return substr($code, 0, 8); 
    }


    public function deleteCode($id){
        $old_code = Code::findOrFail($id);
        $group_inscription = $old_code->groupInscription;
        if($old_code->status == 1){
            $code = $this->codeGenerator();
            $i_code = Code::create([
                'group_inscription_id'=>$old_code->group_inscription_id,
                'institution'=>$old_code->institution  ?? "",
                'code'=>$code,
                'inscription_id'=>0,
                'status'=>0,
                'email'=>""
            ]);
            $old_code->delete();
        }        
        return redirect($group_inscription->getUrl());        
    }
}
