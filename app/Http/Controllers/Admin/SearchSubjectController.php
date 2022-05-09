<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;

class SearchSubjectController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $subject= Subject::where('subject','LIKE','%'.$search.'%')->orWhere('section','LIKE','%'.$search.'%')->orWhere('yearLevel','LIKE','%'.$search.'%')
        ->orWhereHas('teacher', function (Builder $query) use ($search)
        {
            $query->where('name','LIKE','%'.$search.'%');
        })->paginate(10);
        if(count($subject)>0)
        {
            return view('admin.subject_Table', compact('subject'));
        }
        else{
            return back()->with('msg', 'We couldn\'t find "'.$search.'" on this page.' );
        }
    }

}
