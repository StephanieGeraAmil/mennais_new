<?php

namespace App\Http\Controllers;

use App\Models\FirstWorkshopGroup;
use App\Models\Inscription;
use App\Models\SecondWorkshopGroup;
use Illuminate\Http\Request;

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
        $first_workshop_groups = FirstWorkshopGroup::all();
        $second_workshop_groups = SecondWorkshopGroup::all();
        return view('admin.show')
        ->with('first_workshop_groups', $first_workshop_groups)
        ->with('second_workshop_groups', $second_workshop_groups)
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
        $validated_data = $request->validate([            
            'first_workshop_group_id' => 'required|integer',
            'second_workshop_group_id' => 'required|integer',
        ]); 
        $inscription = Inscription::findOrFail($id);
        $inscription->first_workshop_group_id = $validated_data['first_workshop_group_id'];
        $inscription->second_workshop_group_id = $validated_data['second_workshop_group_id'];
        $inscription->save();
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
        //
    }
}
