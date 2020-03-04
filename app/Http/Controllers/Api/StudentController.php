<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use App\Model\Student;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->get();
        return response()->json($students);

        //$students = Student::all();

        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;
        DB::table('students')->insert($data);

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
        $student = DB::table('students')->where('id',$id)->first();
        return response()->json($student);
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
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;
        DB::table('students')->where('id',$id)->update($data);

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
        $student = DB::table('students')->where('id',$id)->first();
        $imagePath = $student->photo;
        unlink($imagePath);
        DB::table('students')->where('id',$id)->delete();
        return response()->json(["message"=>"Data Deleted Successfully!!!"]);

    }
}
