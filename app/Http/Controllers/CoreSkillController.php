<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoreSkill;
use Illuminate\Support\Facades\Validator;

class CoreSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CoreSkill::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:64'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $coreSkill = new CoreSkill($request->all());
        $coreSkill->save();

        return $coreSkill;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CoreSkill::find($id);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:64'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        
        $coreSkill = CoreSkill::find($id);
        $coreSkill->update($request->all());
        $coreSkill->save();

        return $coreSkill;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return CoreSkill::destroy($id);
    }
}
