<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ResourceController extends Controller
{
    public function student(){
        $students = Student::orderBy('id','desc')->get();
        return view('student', compact('students'));
    }

    public function addStudent(){
        return view('studentAdd');
    }
    public function editStudent($id){
        $stu = Student::findOrFail($id);
        return view('studentEdit',compact('stu'));
    }
    public function storeStudent(Request $request){
        $data = Student::create([
            'first_name'=>$request->first_name,
            'last_name'=> $request->last_name,
            'address'=> $request->address
        ]);
        return redirect()->back()->with(['message'=>"inserted successfully"]);
    }
    public function updateStudent(Request $request , $id){
        $student = Student::findOrFail($id);
        $data = $student->update([
            'first_name'=>$request->first_name,
            'last_name'=> $request->last_name,
            'address'=> $request->address
        ]);
        return redirect()->back()->with(['message'=>"updated successfully"]);
    }

    public function deleteStudent($id){
        $stu = Student::findOrFail($id);
        $stu->delete();
        return redirect()->back()->with(['message'=>"deleted successfully"]);

    }

    
}
