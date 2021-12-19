<?php

namespace App\Http\Controllers;

use App\Models\{
    Lesson,
    Student
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::with('lessons')->get()->toJson();
        $lessons = Lesson::with('students')->get()->toJson();

        return view('home', compact('students', 'lessons'));
    }
}
