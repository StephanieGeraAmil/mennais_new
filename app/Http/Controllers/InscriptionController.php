<?php

namespace App\Http\Controllers;

use App\Mail\AdminInscriptionMail;
use App\Mail\FacetofaceInscriptionMail;
use App\Mail\GroupInscriptionMail;
use App\Mail\RecoveryCertificateMail;
use App\Mail\SendInscriptionCodeMail;
use App\Models\Attendance;
use App\Models\Code;
use App\Models\GroupInscription;
use App\Models\Inscription;
use App\Models\Institution;
use App\Models\Payment;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class InscriptionController extends Controller
{
    
    
    public function certificate(Inscription $inscription, $token)
    {           
        if($inscription->validateToken($token)){   
            $attendances = $inscription->attendances;
            if($attendances->count() > 0){
                $today = Carbon::now()->locale('es');
                $today->settings(['formatFunction' => 'translatedFormat']);
                $name = $inscription->userData->name." ".$inscription->userData->lastname;
                $attendance_text = $this->attendance_text($attendances);
                $singular_day = false;
                if($attendances->count() == 1){
                    $singular_day = true;                
                }
                $document = $inscription->userData->document;                
                $data = [
                    'today'=>$today->format('j F Y'),
                    'date'=>$attendance_text,
                    'singular_day'=>$singular_day,
                    'name'=>$name,
                    'document'=>$document
                ];
                $pdf = app('dompdf.wrapper');
                /* return view('pdf.certificate', $data); */
                return $pdf->loadView('pdf.certificate', $data)
                ->setPaper('a4', 'landscape')
                ->download('archivo.pdf');
            }else{
                abort(404);   
            }            
        }else{            
            abort(403);
        }
    }
    
    
    private function attendance_text($attendances){
        if($attendances->count() == 1){            
            $attendance_date = Carbon::parse($attendances->first()->date)->locale('es');
            $attendance_date->settings(['formatFunction' => 'translatedFormat']);
            $attendance_text = $attendance_date->format('j')." de ".$attendance_date->format('F')." de ".$attendance_date->format('Y');
        }else{
            
            $attendance_text = "8 y 9 de julio de 2022";
            /* $month = 0;
            $quantity = $attendances->count();
            $counter = 1;
            foreach($attendances as $attendance){                
                $attendance_date = Carbon::parse($attendance->date)->locale('es');
                $attendance_date->settings(['formatFunction' => 'translatedFormat']);                
                if($counter > 2 && $quantity >= 2){
                    if($counter < $quantity - 1){
                        $attendance_text .= ', ';
                    }else{
                        $attendance_text .= ' y ';
                    }
                }else{
                    if($counter > 1){
                        if($quantity == 2){
                            
                        }else{
                            $attendance_text .= ', ';
                        }
                    }                        
                }                    
                $month = $attendance_date->format('m');
                $attendance_text .= $attendance_date->format('j F');
                $counter ++;
            } */
        }
        return $attendance_text;
    }
    
    
    public function certificateRecovery(){        
        return view('recoverycertificate');
    }
    
    public function certificateRecoveryMail(Request $request){
        $validatedData = $request->validate([
            'document' => 'required|string',
        ]);        
        $document = str_replace(['.','-',' '],'',$validatedData['document']);
        if(is_numeric($document)){            
            $user_data = UserData::where('document', $document)->first();
            if($user_data == null){
                return view('recoverycertificate')->with('fail', true);
            }
            if($user_data->inscription->attendances->count() > 0){
                Mail::to($user_data->email)->send(new RecoveryCertificateMail($user_data->inscription));            
                return view('recoverycertificate')->with('success', true);
            }
            return view('recoverycertificate')->with('fail', 'Attendance error');
        }
        return view('recoverycertificate')->with('wrong_document', 'Documento Invalido');
    }
    
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return redirect('/');
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // $notification_mail = explode(";",config('app.notification_mail'));
        // Mail::to($notification_mail)->send(new FacetofaceInscriptionMail());        
        return view('home');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'lastname' => 'required|string|max:255',
        //     'document' => 'required|string|max:255|unique:user_data',
        //     'email' => 'required|email',
        //     'payment_file'=>'required|image|mimes:jpg,png,jpeg,gif,svg,pdf',
        // ]); 
        
        // $clean_name = preg_replace('/[^A-Za-z0-9\-]/', '_', $request->get('name'));
        // $image_name = Carbon::now()->format('dmyHis')."_".$clean_name.".".$request->payment_file->extension();
        // $request->payment_file->move(public_path('images'),$image_name);        
        
        // $payment = Payment::create([
        //     'url_payment'=>"/images/".$image_name
        // ]);
        
        
        // $user_data = UserData::create([
        //     'name'=>$validatedData['name'],
        //     'lastname'=>$validatedData['lastname'],
        //     'document'=>$validatedData['document'],
        //     'email'=>$validatedData['email']
        // ]);
        
        
        // $inscription = Inscription::create([
        //     'user_data_id'=>$user_data->id,
        //     'payment_id'=>$payment->id
        // ]);
        
        
        
        // // $thumbnail_name = $brand->name."_".$clean_name.".".$request->vehicle_thumbnail->extension();
        // // $request->vehicle_thumbnail->move(public_path('images/thumbnails'),$thumbnail_name);
        
        
        
        // // QrCode::format('png')->size(399)->color(40,40,40)->generate('Make me a QrCode!');
        // // $notification_mail = explode(";",config('app.notification_mail'));
        // Mail::to($user_data->email)->send(new FacetofaceInscriptionMail($inscription));       
        // Mail::to(env('ADMIN_EMAIL'))->send(new AdminInscriptionMail($inscription));             
        // return view('successinscription')
        // ->with('user_data', $user_data);
        
    }
    
    
    
    
    public function attendance(Inscription $inscription, $token){
        if($inscription->validateToken($token)){
            try {                
                $attendance = Attendance::create([
                    'inscription_id'=>$inscription->id,
                    'date'=>Carbon::now()
                ]);            
            } catch (\Throwable $th) {
                
            }
            
            return view('welcome')->with('user_data', $inscription->userData);
        }else{            
            abort(403);
        }
    }
    
    
    public function adminCodeInscription($group_inscription_id, $code){
        $group_inscription = GroupInscription::findOrFail($group_inscription_id);
        if(!$group_inscription->validCode($code)){
            abort('403');
        }
        return view('inscription.code_admin')
        ->with('group_inscription', $group_inscription);
    }






    public function sendInscription(Request $request){
        $validated_data = $request->validate([
            'email' => 'required|email|unique:codes',
            'group_inscription_id' => 'required|integer'
        ]); 
        $group_inscription = GroupInscription::findOrFail($validated_data['group_inscription_id']);
        $find_code_available = false;
        foreach($group_inscription->codes as $code){
            if(!$find_code_available){
                if($code->status == 0){
                    $code->status = 1;
                    $code->email = $validated_data['email'];
                    $code->save();
                    Mail::to($validated_data['email'])->send(new SendInscriptionCodeMail($code));                    
                    $find_code_available = true;
                }
            }
        }
        if($find_code_available == false){
            abort(403); //not more codes available
        }
        return redirect($group_inscription->getUrl());
    }
    
    


    
}
