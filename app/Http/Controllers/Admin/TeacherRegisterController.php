<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\WelcomeTeacherMail;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
    public function index(Teacher $teach)
    {
        return view('admin.teacher', ['teach' => $teach]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email'=>'required|email|string|max:255',
            'address'=>'required|string|max:255',
            'phone'=>'required|string|max:255',
            'gender' =>'required|string',
            'birth_date'=>'required|string|max:255',
            'password' => 'required|min:6',
        ]);
        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' =>$request->input('address'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'birth_date' => $request->input('birth_date'),
            'password' => Hash::make($request->input('password')),
        ]);
        // dd($teacher);
        // Mail::to($teacher['email'])->send(new WelcomeTeacherMail($teacher));
        Alert::toast('New Teacher Added!', 'success');
        return redirect('/admin/teacher');
    }
}
