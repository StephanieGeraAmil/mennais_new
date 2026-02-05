<?php

namespace App\Http\Controllers;

use App\Enums\InscriptionTypeEnum;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Enum;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'document' => 'required|string|max:255',
            'email' => 'required|email',
            'type' => ['required', new Enum(InscriptionTypeEnum::class)],
            'city'=>'string|max:255',
            'institution_name'=>'string|max:255',
            // 'institution_type'=>'string|max:255'
        ]); 
        $user_data = UserData::findOrFail($id);               
        $user_data->name=$validated_data['name'];
        $user_data->document=$validated_data['document'];
        $user_data->email=$validated_data['email'];
        $user_data->city=$validated_data['city'];
        $user_data->institution_name=$validated_data['institution_name'];
        // $user_data->institution_type=$validated_data['institution_type'];
        $user_data->save();
        $inscription = $user_data->inscription;
        $inscription->type = Arr::get($validated_data, "type");
        $inscription->save();
        return redirect("/admin/inscription/".$user_data->inscription->id);
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
