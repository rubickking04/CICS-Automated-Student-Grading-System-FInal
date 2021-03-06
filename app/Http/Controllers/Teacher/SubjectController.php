<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = Subject::where("teacher_id", "=", Auth::user()->id)->latest()->get();
        return view('teacher.subject', compact('subject'));
    }
    public function store(Subject $subject,Request $request)
    {
        $request->validate([
            'description'=>'required|string|max:255',
            'section' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'yearLevel' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
        ]);
        $subject = Subject::create([
            'uuid'=> Str::uuid()->toString(),
            'teacher_id' => Auth::user()->id,
            'subject' =>$request->input('subject'),
            'semester' => $request->input('semester'),
            'section' => $request->input('section'),
            'yearLevel' => $request->input('yearLevel'),
            'description' => $request->input('description'),
        ]);
        Alert::toast('Successfully Created!', 'success');
        return redirect('teacher/class/'.$subject->uuid);
    }
}
