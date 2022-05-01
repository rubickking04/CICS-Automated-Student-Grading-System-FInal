<?php

namespace App\Http\Controllers\Auth;

use Pusher\Pusher;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\TotalUserUpdate;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string',],
            'phone' => ['required', 'string', 'max:15'],
            'birth_date' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'birth_date' =>  $data['birth_date'],
            'password' => Hash::make($data['password']),
        ]);
        Alert::toast('Successfully Registered!', 'success');
        return $user;
    }
    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     event(new Registered($user = $this->create($request->all())));
    //     event(new TotalUserUpdate);
    //     $this->guard()->login($user);
    //     if ($response = $this->registered($request,$user)){
    //         return $response;
    //     }
    //     return $request->wantsJson() ? new JsonResponse([],201) : redirect($this->redirectPath());
    // }
}
