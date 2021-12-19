<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function getList()
    {
        $lessons = Lesson::get();
        return response()->json($lessons);
    }
}
