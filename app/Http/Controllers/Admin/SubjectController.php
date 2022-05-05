<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::latest()->paginate(10);
        return view('admin.subject_Table',compact('subject'));
        // dd($lesson);
    }
}
