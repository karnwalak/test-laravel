<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::get();
        return view('dashboard',compact('data'));
    }

    public function create()
    {
        return view('student/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'contact'=>'required',
            'image'=>'required|mimes:png,jpg',
            'address'=>'required'
        ]);

        $student = new Student;
        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = "student_image";
        $student->name = $request->name;
        $student->email = $request->email;
        $student->contact = $request->contact;
        $student->image = $path.'/'.$filename;
        $student->address = $request->address;
        if($student->save()){
          $file->move($path,$filename);
          return redirect()->route('student.index')->with('message','Student Added Successfully!');
        }else{
          return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'contact'=>'required',
            'image'=>'mimes:png,jpg',
            'address'=>'required'
        ]);
        
        $student = Student::find($student->id);
        $file = $request->file('image');
        if(isset($file)){
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = "student_image";
            $file->move($path,$filename);
            $student->image = $path.'/'.$filename;
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->contact = $request->contact;
        $student->address = $request->address;
        if($student->save()){
            return redirect()->route('student.index')->with('message','Student Updated Successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function destroy(Student $student)
    {
       if(Student::find($student->id)->delete()){
            return redirect()->route('student.index')->with('message','Student Deleted Successfully!');
       }else{
            return redirect()->back()->with('error','Something went wrong!');
       }
    }
}
