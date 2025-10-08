<?php

namespace App\Http\Controllers;

use App\Enums\InscriptionTypeEnum;
use App\Http\Requests\GroupInscriptionRequest;
use App\Http\Requests\GroupCodeUseRequest;
use App\Mail\FacetofaceInscriptionMail;
use App\Mail\AdminGroupInscriptionMail;
use App\Mail\GroupInscriptionMail;
use App\Mail\AdminInscriptionMail;
use App\Models\Code;
use App\Models\GroupInscription;
use App\Models\Payment;
use App\Models\UserData;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GroupInscriptionController extends Controller
{
    public function groupInscription()
    {
        return view('inscription.group');
    }
    public function showJoinForm($id)
    {
        $group = \App\Models\GroupInscription::findOrFail($id);
        return view('inscription.join', compact('group'));
    }

    public function joinStore(Request $request, $id)
    {
        $group = \App\Models\GroupInscription::findOrFail($id);

       $validated_data = $request->validate([
            'code' => 'required|string',
            'type' => 'required|in:virtual,hibrido',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'document' => 'nullable|string',
            'institution_name' => 'nullable|string',
            'institution_type' => 'nullable|string',
        ]);


     $useRequest = new GroupCodeUseRequest([
            'group_inscription_id' => $group->id,
            'code' => $validated_data['code'],
            'type' => $validated_data['type'],
        ]);

    $controller = app(self::class);
    $response = $controller->groupInscriptionUse($useRequest);

    if ($response->getStatusCode() !== 200) {
        return back()->withErrors(['error' => json_decode($response->getContent(), true)['error']]);
    }   
$clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
     $user_data = UserData::create([
            'name' => $clean_name,
            'document' => Arr::get($validated_data, "document"),
            'email' => $validated_data['email'],
            'institution_name' => Arr::get($validated_data, 'institution_name'),
            'institution_type' => Arr::get($validated_data, 'institution_type'),
        ]);
         $inscription = Inscription::create([
            'user_data_id' => $user_data->id,
            'payment_id' => null,
            'status' => 1,
            'type' => $validated_data['type'] === 'hybrid' ? InscriptionTypeEnum::HIBRIDO : InscriptionTypeEnum::REMOTO,
        ]);
        try {
            Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));   
            Mail::to(env('ADMIN_EMAIL', "cgerauy@gmail.com"))->send(new AdminInscriptionMail($inscription));     
            session()->flash('msg', 'Inscripción realizada con exito usando un link de inscripcion grupal!!!');
        } catch (\Throwable $th) {
            Log::error("error: ".$th);
            Log::error("SimpleInscriptionController::Email: ".$user_data->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito usando un link de inscripcion grupal. En caso de no recibir el email, contactese con Audec');
        }  

    return redirect()->route('group.inscription.join', ['id' => $id])
        ->with('success', 'Inscripción completada correctamente.');
    }   
    
    
    public function groupInscriptionStore(GroupInscriptionRequest $request)
    {
        $validated_data = $request->all();
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
        // $code_group_insc = $this->codeGenerator();
          $code_hybrid = $this->codeGenerator(1);
    $code_remote = $this->codeGenerator(2);
        $group_inscription = GroupInscription::create([
            'name'=>$validated_data['name'],
            'email'=>$validated_data['email'],
            'institution'=>Arr::get($validated_data, 'extra.institution',"")?? "",
            'phone'=>$validated_data['phone'],
            'quantity'=>Arr::get($validated_data, 'quantity_insc', 0)?? 0,
            'quantity_remote'=>Arr::get($validated_data, 'quantity_remote', 0)?? 0,
            'quantity_hybrid'=>Arr::get($validated_data, 'quantity_hybrid',0)?? 0,

            'quantity_remote_avaiable'=>Arr::get($validated_data, 'quantity_remote', 0)?? 0,
            'quantity_hybrid_avaiable'=>Arr::get($validated_data, 'quantity_hybrid',0)?? 0,
       
            'payment_id'=>$payment->id,
            'code'=>0,
            'code_hybrid' => $code_hybrid,
             'code_remote' => $code_remote,  
        ]);
        
        /**
        * Create Codes
        */
        
        // $codes = array();
        // $arrayCode = [
        //     'group_inscription_id'=>$group_inscription->id,
        //     'institution'=>$validated_data['extra']['institution']  ?? "",
        //     'code'=>0,
        //     'inscription_id'=>0,
        //     'status'=>0,
        //     'type'=>InscriptionTypeEnum::PRESENCIAL,
        //     'email'=>""
        // ];
    
        
        // for ($i=0; $i < Arr::get($validated_data, 'quantity_insc',0); $i++) { 
        //     $arrayCode['code']=$this->codeGenerator($i);
        //     Code::create($arrayCode);
        // }
        
        // $arrayCode['type'] = InscriptionTypeEnum::REMOTO;
        // for($i=0; $i < Arr::get($validated_data, 'quantity_insc_remote', 0); $i++){
        //     $arrayCode['code']=$this->codeGenerator($i);
        //     Code::create($arrayCode);
        // }

        // $arrayCode['type'] = InscriptionTypeEnum::HIBRIDO;
        // for($i=0; $i < Arr::get($validated_data, 'quantity_insc_hybrid', 0); $i++){
        //     $arrayCode['code']=$this->codeGenerator($i);
        //     Code::create($arrayCode);
        // }
        
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
   public function groupInscriptionUse(GroupCodeUseRequest $request)
{
    $group = \App\Models\GroupInscription::find($request->group_inscription_id);

    if (!$group) {
        return response()->json(['error' => 'Inscripción grupal no encontrada.'], 404);
    }

    $type = $request->type;
    $code = $request->code;

    // Validate code matches the corresponding type
    if ($type === 'hybrid' && $code !== $group->code_hybrid) {
        return response()->json(['error' => 'Código híbrido incorrecto.'], 400);
    }

    if ($type === 'remote' && $code !== $group->code_remote) {
        return response()->json(['error' => 'Código remoto incorrecto.'], 400);
    }

    try {
        \DB::transaction(function () use ($group, $type) {
            $group->lockForUpdate();

            if ($type === 'hybrid') {
                if ($group->quantity_hybrid_avaiable <= 0) {
                    throw new \Exception('No quedan cupos híbridos disponibles.');
                }

                $group->decrement('quantity_hybrid_avaiable', 1);
            } else {
                if ($group->quantity_remote_avaiable <= 0) {
                    throw new \Exception('No quedan cupos remotos disponibles.');
                }

                $group->decrement('quantity_remote_avaiable', 1);
            }
        });
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }

    return response()->json(['success' => 'Código utilizado correctamente.'], 200);
}
    
    private function codeGenerator($i = 15){
        $rand_code = rand(10,500);
        $date = date('YmdHis');
        $value = $rand_code + $date;
        $code = md5($i.":sk".$value.":".$date);
        return substr($code, 0, 8); 
    }
    
    
    // public function deleteCode($id){
    //     $old_code = Code::findOrFail($id);
    //     $group_inscription = $old_code->groupInscription;
    //     if($old_code->status == 1){
    //         $code = $this->codeGenerator();
    //         $i_code = Code::create([
    //             'group_inscription_id'=>$old_code->group_inscription_id,
    //             'institution'=>$old_code->institution  ?? "",
    //             'code'=>$code,
    //             'inscription_id'=>0,
    //             'status'=>0,
    //             'type'=>$old_code->type,
    //             'email'=>""
    //         ]);
    //         $old_code->delete();
    //     }        
    //     return redirect($group_inscription->getUrl());        
    // }
}
