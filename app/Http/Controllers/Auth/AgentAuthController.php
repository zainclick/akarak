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

class AgentAuthController extends Controller
{

    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::AGENCY;

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
        return view('agent.auth.login');
    }


    public function loginAction(Request $request)
    {


        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/agent/dashboard');
        }
        return back()->withInput($request->only('email'));
    }

    public function register()
    {
        $citys = citys::all();
        return view('agents.auth.agent-register',compact('citys'));

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

        if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/agent/dashboard');
        }
        return back()->withInput($request->only('email'));
     
    }

    public function logout(Request $request)
    {
        Auth::guard('agent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/agent/login');
    }


}