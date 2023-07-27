<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
	//
	public function index()
	{
		$students = DB::table('students')->whereNull('deleted_at')->get();

		return view('client.student.index', ['students' => $students]);
	}
	public function create()
	{
		return view('client.student.create');
	}
	public function store(StudentRequest $request)
	{
		if ($request->isMethod('POST')) {
			$params = $request->except('_token');
			if ($request->hasFile('image') && $request->file('image')->isValid()) {
				$params['thumbnail'] = uploadFile('hinh', $request->file('image'));
			};
			Student::create($params);
			return redirect()->route('student')->with('success', 'Thêm thành công');
		}
		return view('client.student.create');
	}
	public function edit($id)
	{
		$student = Student::find($id);
		return view('client.student.edit', ['student' => $student]);
	}
	public function update(StudentRequest $request, $id)
	{
		$student = Student::find($id);
		$student->name = $request->name;
		$student->email = $request->email;
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$resultDL = Storage::delete('/public/' . $student->thumbnail);
			if ($resultDL) {
				$student->thumbnail = uploadFile('hinh', $request->file('image'));
			}
		}
		$student->save();
		return redirect()->route('student')->with('success', 'Cập nhật thành công');
	}
	public function delete($id)
	{
		$student = Student::find($id);
		$student->delete();
		return redirect()->route('student')->with('success', 'Xóa thành công');
	}
}
