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

//     public function joinStore(Request $request, $id)
//     {
//         // $group = \App\Models\GroupInscription::findOrFail($id);
//         $group = GroupInscription::findOrFail($id);
//        $validated_data = $request->validate([
//             'code' => 'required|string',
//             'type' => 'required|in:virtual,hibrido',
//             'name' => 'required|string|max:255',
//             'email' => 'required|email',
//             'document' => 'nullable|string',
//             'institution_name' => 'nullable|string',
//             'institution_type' => 'nullable|string',
//         ]);


//     //  $useRequest = new GroupCodeUseRequest([
//     //         'group_inscription_id' => $group->id,
//     //         'code' => $validated_data['code'],
//     //         'type' => $validated_data['type'],
//     //     ]);

//     // $controller = app(self::class);
//     // $response = $controller->groupInscriptionUse($useRequest);
//         $decrementResult = $this->decrementGroupAvailability($group, $validated_data['code'], $validated_data['type']);

//     if ($decrementResult !== true) {
//         return back()->withErrors(['error' => $decrementResult]);
//     }

//     // if ($response->getStatusCode() !== 200) {
//     //     return back()->withErrors(['error' => json_decode($response->getContent(), true)['error']]);
//     // }   
// $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
//      $user_data = UserData::create([
//             'name' => $clean_name,
//             'document' => Arr::get($validated_data, "document"),
//             'email' => $validated_data['email'],
//             'institution_name' => Arr::get($validated_data, 'institution_name'),
//             'institution_type' => Arr::get($validated_data, 'institution_type'),
//         ]);
//          $inscription = Inscription::create([
//             'user_data_id' => $user_data->id,
//             'payment_id' => null,
//             'status' => 1,
//             'type' => $validated_data['type'] === 'hibrido' ? InscriptionTypeEnum::HIBRIDO : InscriptionTypeEnum::REMOTO,
//         ]);
//         try {
//             Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));   
//             Mail::to(env('ADMIN_EMAIL', "cgerauy@gmail.com"))->send(new AdminInscriptionMail($inscription));     
//             session()->flash('msg', 'Inscripción realizada con exito usando un link de inscripcion grupal!!!');
//         } catch (\Throwable $th) {
//             Log::error("error: ".$th);
//             Log::error("SimpleInscriptionController::Email: ".$user_data->email."; ".env('ADMIN_EMAIL'));
//             session()->flash('msg', 'Inscripción realizada con exito usando un link de inscripcion grupal. En caso de no recibir el email, contactese con Audec');
//         }  

//     return redirect()->route('group.inscription.join', ['id' => $id])
//         ->with('success', 'Inscripción completada correctamente.');
//     }   
    
public function joinStore(Request $request, $id)
{


    $group = GroupInscription::findOrFail($id);

    $validated_data = $request->validate([
        'code' => 'required|string',
        'type' => 'required|in:virtual,hibrido',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'document' => 'nullable|string',
        'institution_name' => 'nullable|string',
        'institution_type' => 'nullable|string',

    ]);

    try {
        DB::transaction(function () use ($group, $validated_data, $request) {
            Log::info("Decrementing type: {$validated_data['type']} for group {$group->id}");
          
            $lockedGroup = GroupInscription::where('id', $group->id)->lockForUpdate()->first();

            if ($validated_data['type'] === 'hibrido') {
                if ($validated_data['code'] !== $lockedGroup->code_hybrid) {
                    throw new \Exception('Código de inscripción completa incorrecto.');
                }
                if ($lockedGroup->quantity_hybrid_avaiable <= 0) {
                    throw new \Exception('No quedan cupos híbridos disponibles.');
                }
                $lockedGroup->decrement('quantity_hybrid_avaiable', 1);
            } else {
                if ($validated_data['code'] !== $lockedGroup->code_remote) {
                    throw new \Exception('Código de inscripción virtual incorrecto.');
                }
                if ($lockedGroup->quantity_remote_avaiable <= 0) {
                    throw new \Exception('No quedan cupos virtuales disponibles.');
                }
                $lockedGroup->decrement('quantity_remote_avaiable', 1);
            }

 
            $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $validated_data['name']);
            $user_data = UserData::create([
                'name' => $clean_name,
                'document' => Arr::get($validated_data, 'document'),
                'email' => $validated_data['email'],
                'institution_name' => Arr::get($validated_data, 'institution_name'),
                'institution_type' => Arr::get($validated_data, 'institution_type'),
            ]);

         
 
      
            $inscription = Inscription::create([
                'user_data_id' => $user_data->id,
                'payment_id' => null,
                'status' => 1,
                'type' => $validated_data['type'] === 'hibrido'
                    ? InscriptionTypeEnum::HIBRIDO
                    : InscriptionTypeEnum::REMOTO,
                'group_inscription_id'=> $group->id,   
            ]);
       

          
            $request->session()->put('new_inscription_id', $inscription->id);
            $request->session()->put('new_user_email', $user_data->email);
        });

      
        $inscription = Inscription::find(session('new_inscription_id'));
        $user_email = session('new_user_email');

        Mail::to($user_email)->send(new FacetofaceInscriptionMail($inscription));
        Mail::to(env('ADMIN_EMAIL', 'cgerauy@gmail.com'))->send(new AdminInscriptionMail($inscription));

        session()->flash('msg', 'Inscripción realizada con éxito usando un link grupal.');
        return redirect()->route('group.inscription.join', ['id' => $id]);

    } catch (\Exception $e) {
        Log::error("Error in joinStore: {$e->getMessage()}");
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

    
    public function groupInscriptionStore(GroupInscriptionRequest $request)

    {
        try{
             Log::info('********************************************************');
                  DB::beginTransaction();
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
        
              if (!$payment) {
            throw new \Exception('Error al crear el registro de pago.');
        }
        /**
        * Create Grupal inscription
        */
        // $code_group_insc = $this->codeGenerator();
          $code_hybrid = $this->codeGenerator(1);
    $code_remote = $this->codeGenerator(2);
        $group_inscription = GroupInscription::create([
            'name'=>$validated_data['name'],
            'email'=>$validated_data['email'],
                   'institution'=>$validated_data['institution'],
            // 'institution'=>Arr::get($validated_data, 'extra.institution',"")?? "",
                
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
        
           if (!$group_inscription) {
            throw new \Exception('Error al crear la inscripción grupal.');
        }

        DB::commit();
        
        try {
                 Log::info('+++++++');
                      Log::info('sending mail to user');
            Mail::to($group_inscription->email)->send(new GroupInscriptionMail($group_inscription));
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("GroupInscriptionController::Email: ".$group_inscription->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }
        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new AdminGroupInscriptionMail($group_inscription));
              Log::info('+++++++');
                      Log::info('sending mail to admin');
            session()->flash('msg', 'Inscripción realizada con exito!!!');
        } catch (\Throwable $th) {
            Log::error("GroupInscriptionController::Email: ".$group_inscription->email."; ".env('ADMIN_EMAIL'));
            session()->flash('msg', 'Inscripción realizada con exito. En caso de no recibir el email, contactese con Audec');
        }        
        // return redirect($group_inscription->getUrl());        
        return redirect()->back()->with('msg', 'Inscripción realizada con éxito');
 } catch (\Throwable $e) {
        DB::rollBack(); // ❌ Roll back everything
        Log::error('Error creating group inscription: '.$e->getMessage());

        return redirect()->back()
            ->withErrors(['error' => 'Ocurrió un error: '.$e->getMessage()])
            ->withInput();
    }
    }



    
    private function codeGenerator($i = 15){
        $rand_code = rand(10,500);
        $date = date('YmdHis');
        $value = $rand_code + $date;
        $code = md5($i.":sk".$value.":".$date);
        return substr($code, 0, 8); 
    }
    
    

}
