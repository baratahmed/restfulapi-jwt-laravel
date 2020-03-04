<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Section;
//use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return response()->json($sections); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:25',
        ]);

        $section = Section::create($request->all());
        return response()->json(["message"=>"Data Inserted Successfully!!!"]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::findorfail($id);
        return response()->json($section); 
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
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|max:25',
        ]);
        $section = Section::findorfail($id);
        $section->update($request->all());
        return response()->json(["message"=>"Data Updated Successfully!!!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::where('id',$id)->delete();
        return response()->json(["message"=>"Data Deleted Successfully!!!"]);
    }
}
