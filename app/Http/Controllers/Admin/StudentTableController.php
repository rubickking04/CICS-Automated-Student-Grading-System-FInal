<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StudentTableController extends Controller
{
    public function index()
    {
        $user = User::latest()->paginate(10);
        return view('admin.student', compact('user'));
    }
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::toast('Removed Successfully!', 'success');
        return back();
    }
    public function search(Request $request)
    {
        $search =$request->input('search');
        $user= User::where('name','LIKE','%'.$search.'%')->orWhere ('email','LIKE','%'.$search.'%')->paginate(10);
        if (count($user)>0){
            return view('admin.student',compact('user'));
        }
        else{
            return back()->with('msg', 'ERROR 501 | '. $search . ' Not Found! 😢' );
        }
    }
}
