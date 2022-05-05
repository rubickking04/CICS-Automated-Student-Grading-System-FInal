<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Exports\UserGrade;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserGradeExportController extends Controller
{
    public function index()
    {
        $lesson = Lesson::with('teachers', 'grades')->where('user_id', '=', Auth::user()->id)->get();
        $grades= Grade::where('user_id', '=', Auth::user()->id)->sum(DB::raw('midterm + finalterm'))/2;
        return view('grade', compact('lesson', 'grades'));
        // dd($grades);
        // dd($hell);
    }
    public function export()
    {
        $lesson = Lesson::with('teachers')->where('user_id', '=', Auth::user()->id)->get();
        view('grade', compact('lesson'));
        $pdf = PDF::loadView('download',['lesson'=>$lesson]);
        return $pdf->download('My Grades.pdf');
        // dd($pdf);
    }
    public function viewPdf()
    {
        $lesson = Lesson::with('teachers')->where('user_id', '=', Auth::user()->id)->get();
        view('grade', compact('lesson'));
        $pdf = PDF::loadView('download',['lesson'=>$lesson]);
        return $pdf->stream('My Grades.pdf');
        // dd($pdf);
    }
}
