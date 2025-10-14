<?php

namespace App\Http\Controllers;

use App\Enums\InscriptionTypeEnum;
use App\Http\Requests\SendInscriptionRequest;
use App\Mail\RecoveryCertificateMail;
use App\Mail\SendInscriptionCodeMail;
use App\Models\Attendance;
use App\Models\GroupInscription;
use App\Models\Inscription;
use App\Models\UserData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InscriptionController extends Controller
{


    public function certificate(Inscription $inscription, $token)
    {
        if ($inscription->validateToken($token)) {
            $attendances = $inscription->attendances;
            if ($attendances->count() > 0) {
                $today = Carbon::now()->locale('es');
                $today->settings(['formatFunction' => 'translatedFormat']);
                // $name = $inscription->userData->name . " " . $inscription->userData->lastname;
                  $name = $inscription->userData->name ;
                $attendance_list = Attendance::where('inscription_id', $inscription->id)->get();
                // Format the attendance list for the view
                $attendance_text = "";
                foreach ($attendance_list as $attendance) {
                  
                    // if ($attendance->date == "2024-12-10") {
                    //     if($attendance_text!=""){
                    //         $attendance_text .=" y el día ";  
                    //     }
                    //     $attendance_text .= '10 de diciembre (Presencial)';
                    // } 
                    // elseif ($attendance->date == "2024-12-11") {
                    //      if($attendance_text!=""){
                    //         $attendance_text .=" y el día ";  
                    //     }
                    //     $attendance_text .= '11 de diciembre (Sesión Virtual)';
                    // // } elseif ($attendance->date == "2024-02-21") {
                    // //     $attendance_text .= '<li>21 de febrero, segunda Sesión Virtual.</li>';
                    // }

                    //  if ($attendance->date == "2025-02-06") {
                    //     if($attendance_text!=""){
                    //         $attendance_text .=" y el día ";  
                    //     }
                    //     $attendance_text .= '6 de febrero (Presencial)';
                    // } 
                    // elseif ($attendance->date == "2025-02-20") {
                    //      if($attendance_text!=""){
                    //         $attendance_text .=" y el día ";  
                    //     }
                    //     $attendance_text .= '20 de febrero (Sesión Virtual)';
               
                    // }
                }
                // Log::info("attendance_list: " . $attendance_list);
                // Log::info("attendance_text: " . $attendance_text);
                $document = $inscription->userData->document;
                $data = [
                    'today' => $today->format('j F Y'),
                    'name' => $name,
                    'attendance_text' => $attendance_text,
                    'document' => $document
                ];
                $pdf = app('dompdf.wrapper');
                return $pdf->loadView('pdf.certificate', $data)
                    ->setPaper('a4', 'landscape')
                    ->download('certificado_' . $token . '.pdf');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    private function attendance_text($attendances)
    {

        if ($attendances->count() == 1) {
            $attendance_date = Carbon::parse($attendances->first()->date)->locale('es');
            $attendance_date->settings(['formatFunction' => 'translatedFormat']);
            $attendance_text = $attendance_date->format('j') . " de " . $attendance_date->format('F') . " de " . $attendance_date->format('Y');
        } else {
            $date_text = "";
            $limit = $attendances->count();
            $last = $limit - 1;
            for ($i = 0; $i < $limit; $i++) {
                if ($i > 0) {
                    if ($i == $last) {
                        $date_text .= " y ";
                    } else {
                        $date_text .= ", ";
                    }
                }
                $date = Carbon::parse($attendances[$i]->date)->locale('es');
                $date_text .= $date->format('j');
            }
            $date->settings(['formatFunction' => 'translatedFormat']);
            $attendance_text = $date_text . " de " . $date->format('F') . " de " . $date->format('Y');
        }
        return $attendance_text;
    }


    public function certificateRecovery()
    {
        return view('recoverycertificate');
    } 

    public function certificateRecoveryMail(Request $request)
    {
        $validatedData = $request->validate([
            'document' => 'required|string',
        ]);
        $document = str_replace(['.', '-', ' '], '', $validatedData['document']);
        // if (is_numeric($document)) {
            $user_data = UserData::where('document', $document)->first();
            if ($user_data == null) {
                return view('recoverycertificate')->with('fail', true);
            }
            if ($user_data->inscription->attendances->count() > 0) {
                Mail::to($user_data->email)->send(new RecoveryCertificateMail($user_data->inscription));
                return view('recoverycertificate')->with('success', true);
            }
            return view('recoverycertificate')->with('fail', 'Attendance error');
        // }
        // return view('recoverycertificate')->with('wrong_document', 'Documento Invalido');
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




    public function attendance(int $inscription_id, $token)
    {

        $inscription = Inscription::find($inscription_id);

        $returned = Arr::where(explode(",", env("EVENTDATES", "2025-10-07")), function ($value) {
            return Carbon::parse($value)->isToday();
        });

        if ($inscription === null || empty($returned)) {
            return redirect('/');
        }

        if ($inscription->validateToken($token)) {
            try {
                Attendance::create([
                    'inscription_id' => $inscription->id,
                    'date' => Carbon::now(),
                    'user_id' => 0,
                    'type' => InscriptionTypeEnum::REMOTO
                ]);
            } catch (\Throwable $th) {
            }

            return view('welcome')->with('zoom_link', env('ZOOMLINK', "https://us02web.zoom.us/j/82435816542?pwd=Q2F1cVdZMi96OGl1Q3lidlkzSTlLdz09"));
                // return view('welcome')->with('zoom_link', env('ZOOMLINK' . Carbon::now()->format('Ymd'), "https://us02web.zoom.us/j/82435816542?pwd=Q2F1cVdZMi96OGl1Q3lidlkzSTlLdz09"));
        } else {
            abort(403);
        }
    }


    public function presencialAttendance(int $inscription_id, $token)
    {

        $inscription = Inscription::find($inscription_id);
        Log::debug($inscription_id);
        $returned = Arr::where(explode(",", env("PRESENCIALEVENTDATES", "2025-10-07")), function ($value) {
            return Carbon::parse($value)->isToday();
        });
        Log::debug($inscription);
        Log::debug($returned);
        if ($inscription === null || empty($returned)) {
            return redirect('/');
        }
        if ($inscription->type !== InscriptionTypeEnum::HIBRIDO) {
            return view('errorPresencialInscrption')->with('userData', $inscription->userData);
        }

        if ($inscription->validateToken($token)) {
            try {
                Attendance::create([
                    'inscription_id' => $inscription->id,
                    'date' => Carbon::now(),
                    'user_id' => 0,
                    'type' => InscriptionTypeEnum::PRESENCIAL
                ]);
            } catch (\Throwable $th) {
            }

            return view('welcomePresencial')->with('userData', $inscription->userData);
        } else {
            abort(403);
        }
    }


    public function adminCodeInscription($group_inscription_id, $code)
    {
        $group_inscription = GroupInscription::findOrFail($group_inscription_id);
        if (!$group_inscription->validCode($code)) {
            abort('403');
        }
        return view('inscription.code_admin')
            ->with('group_inscription', $group_inscription);
    }






    public function sendInscription(SendInscriptionRequest $request)
    {
        $validated_data = $request->validated();
        $group_inscription = GroupInscription::findOrFail($validated_data['group_inscription_id']);
        $code = $group_inscription->codes()->where('status', 0)->where("type", Arr::get($validated_data, 'type'))->first();
        if ($code === null) {
            return Redirect::back()->withErrors(['no_code' => 'No cuenta con códigos disponibles']);
        }
        $code->status = 1;
        $code->email = $validated_data['email'];
        $code->save();
        try {
            Mail::to($validated_data['email'])->send(new SendInscriptionCodeMail($code));
        } catch (\Throwable $th) {
            Log::error("InscriptionController::Email: " . $validated_data['email'] . "; " . env('ADMIN_EMAIL'));
        }
        return redirect($group_inscription->getUrl());
    }
}
public function deleteInscription(int $inscription_id)
{
    $inscription = Inscription::findOrFail($inscription_id);

    DB::transaction(function () use ($inscription) {

        // 1. Delete all attendances/accreditations
        $inscription->attendances()->delete();

        // 2. Increment available quantity if it belongs to a group
        if ($inscription->group_inscription_id) {
            $group = GroupInscription::lockForUpdate()->find($inscription->group_inscription_id);

            if ($inscription->type === InscriptionTypeEnum::HIBRIDO) {
                $group->increment('quantity_hybrid_avaiable', 1);
            } else {
                $group->increment('quantity_remote_avaiable', 1);
            }
        }

        // 3. Delete the inscription itself
        $inscription->delete();
    });

     return redirect('/admin/');
}