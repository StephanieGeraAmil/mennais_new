<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\GroupInscription;
use App\Models\Inscription;
use App\Models\UserData;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;



class AdminInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $inscription = Inscription::findOrFail($id);
        return view('admin.show')
        ->with('inscription', $inscription);
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
/*         $inscription = Inscription::findOrFail($id);
        $inscription->save(); */
        return redirect('/admin/inscription/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Log::info('+++++++');
                      Log::info('deleting inscription id: ' . $id);
    $inscription = Inscription::findOrFail($id);

    DB::transaction(function () use ($inscription) {

        // 1. Delete all attendances/accreditations
        $inscription->attendances()->delete();

        // 2. Increment available quantity if it belongs to a group
        if ($inscription->group_inscription_id) {
            $group = GroupInscription::lockForUpdate()->find($inscription->group_inscription_id);
            if ($group) {
                if ($inscription->type === InscriptionTypeEnum::HIBRIDO) {
                    $group->increment('quantity_hybrid_avaiable', 1);
                } else {
                    $group->increment('quantity_remote_avaiable', 1);
                }
            }
        }

        // 3. Delete the inscription itself
        $inscription->delete();
    });

     return redirect('/admin/');
    }
}
