<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['students' => $students], Response::HTTP_OK);
    }

    public function show(Student $student)
    {

        return response()->json(['student' => $student], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|integer',
            'room' => 'required|integer',
            'img' => 'required|string',
        ]);

        $student = Student::create($data);

        return response()->json(['message' => 'Student created', 'student' => $student], Response::HTTP_CREATED);
    }

    public function update(Request $request, Student $student)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|integer',
            'room' => 'required|integer',
            'img' => 'required|string',
        ]);

        $student->update($data);

        return response()->json(['message' => 'Student updated', 'student' => $student], Response::HTTP_OK);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Student deleted'], Response::HTTP_NO_CONTENT);
    }
}
