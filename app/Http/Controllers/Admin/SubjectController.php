<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
    public function index(Lesson $lesson)
    {
        $subject = Subject::latest()->paginate(10);
        return view('admin.subject_Table',compact('subject'));
    }
    public function destroy(int $id)
    {
        $subject = Subject::where('id',$id)->first();
        $subject->delete();
        Alert::toast('Successfully Deleted!', 'success');
        return back();
        // dd($subject);
    }
}
