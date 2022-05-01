<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
