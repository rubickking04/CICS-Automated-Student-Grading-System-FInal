<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function store(Request $request)
    {
        $decrypted = $request->input('password');
        $user      = User::where('email', $request->input('email'))->first();
        if ($user) {
            if (Crypt::decrypt($user->password) == $decrypted) {
                Auth::login($user);
                Alert::toast('Welcome, '. Auth::user()->name, 'success');
                return $this->sendLoginResponse($request);
            }
        }
        return $this->sendMyFailedLoginResponse($request);
    }
    protected function sendMyFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        // $admin = \App\Models\Teacher::where($this->username(), $request->{$this->username()})->first();
        // if ($admin && !Hash::check($request->password, $admin->password)) {
        //     $errors = ['password' => 'Teacher password is incorrect.'];
        // }
        $user = \App\Models\User::where($this->username(), $request->{$this->username()})->first();
        if ($user && !Hash::check($request->password, $user->password)) {
            $errors = ['password' => 'The password is incorrect.'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
