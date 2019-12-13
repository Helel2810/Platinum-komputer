<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

class CustomerAuthController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('front.login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
          'user_name' => 'required|unique:customers',
          'password' => 'required|confirmed|min:6',
          'email' => 'required|email|unique:customers',
          'gender' => 'required',
          'telephone' => 'required|numeric',
          'full_name' => 'required'
      ]);
        $data = $request->all();
        Customer::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'telephone' => $data['telephone'],
            'full_name' => $data['full_name'],
            'status' => 'active',
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->intended(route('front'));
    }

    public function loginCustomer(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('front'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('front');
    }

}
