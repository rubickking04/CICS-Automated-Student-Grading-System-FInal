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
            return back()->with('msg', 'We couldn\'t find "'.$search.'" on this page.' );
        }
    }
    public function update(int $id, Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'email'=>'required|email|string|max:255',
            'phone' =>'required|string',
            'address' =>'required|string',
            'birth_date' =>'required|string',
        ]);
        $user= User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->birth_date = $request['birth_date'];
        $user->gender = $request['gender'];
        $user->save();
        Alert::toast('Updated Successfully!', 'success');
        return back();
        // dd($user);
    }
}
