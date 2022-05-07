<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    public function index(Subject $subjects, Request $request, User $user)
    {
        $subject = Subject::where("teacher_id", "=", Auth::user()->id)->latest()->get();
        $sub = collect($subjects)->first();
        $lesson = Lesson::with('student','grades')->where('subject_id', $sub)->latest()->get();
        return view('teacher.class', compact('subject', 'lesson'), ['subjects' => $subjects]);
    }
    public function destroy(int $id)
    {
        $subject = Subject::where('id', $id)->firstorfail()->delete();
        Alert::toast('Successfully Deleted!', 'success');
        return redirect('teacher/home');
    }
}
