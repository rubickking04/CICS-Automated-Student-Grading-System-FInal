<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/teacher/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('teacher.login');
    }
    // public function store(Request $request)
    // {
    //     $decrypted = $request->input('password');
    //     $teacher      = Teacher::where('email', $request->input('email'))->first();
    //     if ($teacher) {
    //         if (Crypt::decrypt($teacher->password) === $decrypted) {
    //             Auth::login($teacher);
    //             Alert::toast('Welcome, '. Auth::user()->name, 'success');
    //             return $this->sendLoginResponse($request);
    //         }
    //     }
    //     return $this->sendMyFailedLoginResponse($request);
    //     // dd(Crypt::decrypt($teacher->password));
    // }
    // protected function sendMyFailedLoginResponse(Request $request)
    // {
    //     $errors = [$this->username() => trans('auth.failed')];
    //     $teacher = \App\Models\Teacher::where($this->username(), $request->{$this->username()})->first();
    //     if ($teacher && !Hash::check($request->password, $teacher->password)) {
    //         $errors = ['password' => 'Password is incorrect.'];
    //     }
    //     if ($request->expectsJson()) {
    //         return response()->json($errors, 422);
    //     }
    //     return redirect()->back()
    //         ->withInput($request->only($this->username(), 'remember'))
    //         ->withErrors($errors);
    // }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('teacher');
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }
}
