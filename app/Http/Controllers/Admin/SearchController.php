<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search =$request->input('search');
        $teach= Teacher::where('name','LIKE','%'.$search.'%')->orWhere ('email','LIKE','%'.$search.'%')->paginate(10);
        if (count($teach)>0){
            return view('admin.teacher_table',compact('teach'));
        }
        else{
            return back()->with('msg', 'ERROR 501 | '. $search . ' Not Found! 😢' );
        }
    }
    public function searchSubject(Request $request)
    {
        $search =$request->input('search');
        $subject= Subject::where('subject','LIKE','%'.$search.'%')
                ->orWhereHas('teacher', function (Builder $query) use ($search)
                {
                    $query->where('name','LIKE','%'.$search.'%');
                })
                ->orWhere('section','LIKE','%'.$search.'%')->paginate(10);
        if (count($subject)>0){
            return view('admin.subject_table',compact('subject'));
        }
        else{
            return back()->with('msg', 'ERROR 501 | '. $search . ' Not Found! 😢' );
        }
    }
}
