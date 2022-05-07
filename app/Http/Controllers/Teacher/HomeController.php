<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $subject = Subject::where("teacher_id", "=", Auth::user()->id)->latest()->get();
        return view('teacher.home', compact('subject'));
    }
}
