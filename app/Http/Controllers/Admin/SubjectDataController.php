<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectDataController extends Controller
{
    public function index(Subject $subjects, Request $request, Lesson $lesson)
    {
        $subject = Subject::where("teacher_id", "=", Auth::user()->id)->get();
        $sub = collect($subjects)->first();
        $lesson = Lesson::with('student','grades')->where('subject_id', $sub)->get();
        return view('admin.subject_Data', compact('subject', 'lesson'), ['subjects' => $subjects]);
    }
    public function update(int $id, Request $request)
    {
        $request->validate([
            'midterm' => 'required',
            'finalterm' => 'required',
        ]);
        $grade = Grade::find($id);
        $grade->midterm = $request['midterm'];
        $grade->midterm = $request['midterm'];
        $grade->save();
        Alert::toast('Successfully Updated!', 'success');
        return back();
    }
}
