<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use App\Exports\UserGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Teacher $teach, Request $request)
    {
        $lesson = Lesson::with('teachers', 'grades')->where('user_id', '=', Auth::user()->id)->latest()->get();
        return view('home',compact('lesson'));
        // dd($lesson);
    }
    public function destroy(int $id)
    {
        $lesson = Lesson::find($id)->delete();
        Alert::toast('Unenrolled Successfully!', 'success');
        return redirect('/home');
    }
}
