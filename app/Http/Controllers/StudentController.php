<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
		public function index(){
			$students = DB::table('students')->get();

			return view('client.student.index',['students' => $students]);
		}
		public function create(){
			return view('client.student.create');
		}
		public function store(Request $request){
			$request->validate([
				'name' => 'required',
				'email' => 'required|email|unique:students',
			]);
			$student = new Student();
			$student->name = $request->name;
			$student->email = $request->email;
			$student->save();
			return redirect()->route('student')->with('success','Thêm thành công');
		}
}
