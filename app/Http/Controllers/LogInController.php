<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;

class LogInController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function id()
    // {
    //     return 'name';
    // }
    //
    public function index()
    {
        return view('login', [
            "title" => "Log In"
        ]);
    }

    public function authenticate(Request $request)
    {
        // $credentials = $request->validate([
        //     'admin' => 'required',
        //     'password' => 'required'
        // ]);

        // if(Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }

        // return back()->with('Log in Error', 'Login failed');

        $request->validate([
            'admin' => ['required'],
            'password' => ['required'],
        ]);
        // if(Auth::attempt($adminid)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }
        $idadmin = $request->admin;
        $password = $request->password;
        $userdata = DB::table('ADMIN')->where('ID_ADMIN', $idadmin)->first();
        @dd($userdata);
        // $obj = get_object_vars($userdata);
        // $request->session()->put('idadmin', $obj['ID_ADMIN']);
        if (is_null($userdata)) {
            return back()->with('LoginError', 'Log In Failed');
        } else {
            $obj = get_object_vars($userdata);

            if ($password == $obj['PASSWORD_ADMIN']) {
                $request->session()->put('idadmin', $request->admin);

                return view('/home', [
                    'admin' => $idadmin,
                    'password' => $obj
                ]);
            } else {
                return back()->with('LoginError', 'Log In Failed');
            }
        }
    }

    // public function logout(Request $request){
    //     Auth::logout();
    //     request()->session()->invalidate();
    //     request()->session()->regenerateToken();
    //     return redirect('/');
    // }
}
