<?php

namespace App\Http\Controllers\Admin;

use Pusher\Pusher;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\TotalUserUpdate;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index()
    {
        // $users = event(new TotalUserUpdate);
        $user = User::all()->count();
        return view('admin.home', compact('user'));
    }
}
