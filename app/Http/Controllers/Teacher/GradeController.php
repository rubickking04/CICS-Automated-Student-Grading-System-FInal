<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Subject;
use App\Mail\MyMailTest;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class GradeController extends Controller
{
    public function store(int $id,Request $request)
    {
        $request->validate([
            'midterm' => 'required',
            'finalterm' => 'required',
            'exam' => 'required',
        ]);
        $user = User::find($id);
        $grade = Grade::create([
            'lesson_id'=> $request->input('lesson_id'),
            'subject_id'=>$request->input('subject_id'),
            'user_id' => $user->id,
            'teacher_id' => Auth::user()->id,
            'midterm' => $request->input('midterm'),
            'finalterm' => $request->input('finalterm'),
            'exam' => $request->input('exam'),
        ]);
        Mail::to($user->email)->send(new \App\Mail\MyMailTest($grade));
        Alert::toast('Successfully Uploaded!', 'success');
        return back();
        // dd($user->email);
    }
    public function destroy(int $id)
    {
        $lesson = Lesson::find($id)->delete();
        // dd($lesson);
        Alert::toast('Successfully Deleted!', 'success');
        return back();
    }
}
