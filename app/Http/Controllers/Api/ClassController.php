<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\ModelClass;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$classes = DB::table('classes')->get();
        //return response()->json($classes);

        return response()->json(ModelClass::all());
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
            'class_name' => 'required|unique:classes|max:25'
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->insert($data);
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
        $class = DB::table('classes')->where('id',$id)->first();
        return response()->json($class);
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
            'class_name' => 'required|unique:classes|max:25'
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->where('id',$id)->update($data);
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
        DB::table('classes')->where('id',$id)->delete();
        return response()->json(["message"=>"Data Deleted Successfully!!!"]);
    }
}
