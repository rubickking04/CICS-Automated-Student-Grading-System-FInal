<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherTableController extends Controller
{
    public function index(Request $request)
    {
        $teach = Teacher::latest()->paginate(10);
        return view('admin.teacher_table', compact('teach'));
    }
    public function destroy(int $id)
    {
        $teach = Teacher::find($id);
        $teach->delete();
        Alert::toast('Removed Successfully!', 'success');
        return back();
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
        $user= Teacher::find($id);
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
