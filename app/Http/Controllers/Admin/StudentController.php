<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function getList()
    {
        $students = Student::get();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        try {
            $student = Student::findOrfail($request->studentId);
            $student->lessons()->sync($request->lessonIds);
            
            return response()->json([
                'status' => true,
                'message' => 'Signed in successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred on the server',
                'data'=> $e
            ], 500);
        }
    }
}
