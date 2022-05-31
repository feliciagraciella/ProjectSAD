<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;

class LogInController extends Controller
{
    //
    public function index()
    {
        return view('login', [
            "title" => "Log In"
        ]);
    }

    public function authenticate(Request $request)
    {
        // $user = Auth::user() ->id;
        // $adminid = $request->validate([
        //     'idadmin' => ['required'],
        //     'password' => ['required'],
        // ]);
        // if(Auth::attempt($adminid)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }

        // return back()->with('LoginError', 'Log In Failed');

        $idadmin = $request->idadmin;
        $password = $request->password;
        $userdata = DB::table('ADMIN')->where('ID_ADMIN', $idadmin)->first();

        // $obj = get_object_vars($userdata);
        // $request->session()->put('idadmin', $obj['ID_ADMIN']);
        if (is_null($userdata)) {
            return back()->with('LoginError', 'Log In Failed');
        } else {
            $obj = get_object_vars($userdata);

            if ($password == $obj['PASSWORD_ADMIN']) {

                $request->session()->put('idadmin', $obj['ID_ADMIN']);
                // Session::put('idadmin', $obj['ID_ADMIN']);

                // $user = Auth::user() ->id;

                // $admin = session('idAdmin');

                return view('/', [
                    'idadmin' => $idadmin,
                    'userdata' => $obj
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
