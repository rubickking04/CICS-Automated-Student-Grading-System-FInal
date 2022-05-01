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
}
