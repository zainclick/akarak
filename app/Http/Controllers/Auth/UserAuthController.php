<?php

namespace App\Http\Controllers\Auth;

use Auth;
use MainHelper;
use Illuminate\Http\Request;
use App\Models\Backend\citys;
use App\Models\Backend\agencies;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class UserAuthController extends Controller
{

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login()
    {
        return view('user.auth.login');
    }


    public function loginAction(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('front-user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        
            return redirect()->intended('/user/dashboard');
        }
        return back()->withInput($request->only('email'));
    }

    public function register()
    {
        $citys = citys::all();
        return view('agencies.auth.vendor-register',compact('citys'));

    }

    public function registerAction(Request $request)
    {

        $request->merge([
            'slug'=>MainHelper::slug($request->name)
        ]);

  
        $this->validate($request, [
            'name'   => 'required',
            'email'   => 'required|email',
            'password' => 'required|min:6',
            'phone'   => 'required',

        ]);

        $agency = agencies::create([
            'name_ar' => $request['name'],
            'name_en' => $request['name'],
            'email' => $request['email'],
            'mobile' => $request['phone'],
            'slug' => $request['name'],
            'password' => Hash::make($request['password']),
            'package' => 1,
            'status' => '0',
            'admin_id' => 1,
            
        ]);

        if (Auth::guard('agency')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/agency/dashboard');
        }
        return back()->withInput($request->only('email'));
     
    }

    public function logout(Request $request)
    {
        Auth::guard('front-user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/user/login');
    }


}