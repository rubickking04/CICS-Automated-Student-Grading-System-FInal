<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index(Subject $subjects)
    {
        $lesson = Lesson::with('teachers')->where('user_id', '=', Auth::user()->id)->latest()->get();
        return view('subjects',compact('lesson'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'uuid'=> 'required|uuid',
        ]);
        $sub = Subject::where('uuid', $request->uuid)->first();
        if ($sub === null){
            return back()->with('msg','This Class Code doesn\'t exists anymore');
        }
        elseif ($sub->exists()){
            if (Lesson::withTrashed()->where('user_id',Auth::user()->id)->where('subject_id', $sub->id)->exists()){
                return back()->with('msg','This Class Code already exists');
            }
            else {
                $lesson= Lesson::create([
                    'user_id' => Auth::user()->id,
                    'subject_id' => $sub->id,
                    'teacher_id' => $sub->teacher_id,
                    'uuid' => $sub->uuid,
                    'description' => $sub->description,
                    'subject' => $sub->subject,
                    'yearLevel' =>$sub->yearLevel,
                    'room' => $sub->room,
                    'section' => $sub->section,
                ]);
                Alert::toast('New Class Added!', 'success');
                return redirect('/home');
            }
        }
    }
}


