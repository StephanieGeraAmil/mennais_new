<?php

namespace App\Http\Controllers;

use App\Mail\FacetofaceInscriptionMail;
use App\Models\Attendance;
use App\Models\GroupInscription;
use App\Models\Inscription;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools_list = School::all();
        $registered_users = Inscription::with('userData')
        ->with('institution')
        ->with('attendances')->get();
        $registered_users_quantity = $registered_users->count();                
        $accreditations = Attendance::all()->count();
        return view('admin.index')
        ->with('accreditations',$accreditations)
        ->with('schools_list',$schools_list)
        ->with('registered_users_quantity',$registered_users_quantity)
        ->with('registered_users',$registered_users);
    }


    public function groupInsc(){
        $group_inscriptions = GroupInscription::all();
        return view('admin.group')
        ->with('group_inscriptions',$group_inscriptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function resendQr($id){
        $inscription = Inscription::findOrFail($id);        
        Mail::to($inscription->userData->email)->send(new FacetofaceInscriptionMail($inscription));   
        return redirect('/admin/inscription/'.$id);
    }

    public function manualAttendance(Request $request){
        $validated_data = $request->validate([
            'acreditation_date' => 'required|date',
            'inscription_id' => 'required|integer'
        ]);
        $date = Carbon::createFromFormat('Y-m-d',  $validated_data['acreditation_date']); 
        $inscription = Inscription::findOrFail($validated_data['inscription_id']);
        $user_id = auth()->user()->id;
        $attendance = Attendance::create([
            'inscription_id'=>$inscription->id,
            'date'=>$date,
            'user_id'=>$user_id
        ]);            
        return redirect("/admin/inscription/".$inscription->id);
                
    }
        
}
