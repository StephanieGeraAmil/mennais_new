<?php

namespace App\Http\Controllers;

use App\Mail\AdminGroupInscriptionMail;
use App\Mail\GroupInscriptionMail;
use App\Models\Code;
use App\Models\GroupInscription;
use App\Models\Institution;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GroupInscriptionController extends Controller
{
    public function groupInscription()
    {
        return view('inscription.group');
    }


    public function groupInscriptionStore(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',            
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'institution_name' => 'required|string|max:255',
            // 'institution_type' => 'required|boolean',
            'city' => 'required|string|max:255',
            'quantity_insc' => 'required|integer',
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
            // 'is_formal_institution'=>$validated_data['institution_type'],
            'city'=>$validated_data['city']
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
            'institution_id'=>$institution->id,
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
                'institution_id'=>$institution->id,
                'code'=>$code,
                'inscription_id'=>0,
                'status'=>0,
                'email'=>""
            ]);
            array_push($codes,$i_code);
        }
        Mail::to($group_inscription->email)->send(new GroupInscriptionMail($group_inscription));
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminGroupInscriptionMail($group_inscription));
        
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
                'institution_id'=>$old_code->institution_id,
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
