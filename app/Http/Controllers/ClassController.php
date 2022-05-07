<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index(Lesson $lesson, Subject $subjects, Request $request)
    {
        $sub = collect($subjects)->first();
        $les = Lesson::with('student','grades')->where('subject_id', '=', $lesson->subject_id)->latest()->get();
        $lesson = Lesson::with('teachers', 'student')->where('user_id', '=', Auth::user()->id)->latest()->get();
        foreach ($les as $lessons)
        {
            $less= $lessons->teachers->name;
            $teach = $lessons->teachers->image;
            $uuid = $lessons->uuid;
            $subject = $lessons->subject;
            $description = $lessons->description;
            $section = $lessons->section;
            $id = $lessons->id;
        }
        return view('class', compact('lesson','less', 'les', 'teach','uuid', 'subject', 'description','section', 'id'),['lesson'=>$lesson]);
        // dd($less);
    }
}
