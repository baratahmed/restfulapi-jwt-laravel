<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
//use DB;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects); 
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
            'subject_name' => 'required|unique:subjects|max:25',
            'subject_code' => 'required|unique:subjects|max:25'
        ]);
        // $data = array();
        // $data['class_id'] = $request->class_id;
        // $data['subject_name'] = $request->subject_name;
        // $data['subject_code'] = $request->subject_code;
        // DB::table('subjects')->insert($data);

        $subject = Subject::create($request->all());
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
        $subject = Subject::findorfail($id);
        return response()->json($subject); 
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
            'subject_name' => 'required|max:25',
            'subject_code' => 'required|max:25'
        ]);
        $subject = Subject::findorfail($id);
        $subject->update($request->all());
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
        Subject::where('id',$id)->delete();
        return response()->json(["message"=>"Data Deleted Successfully!!!"]); 
    }
}
