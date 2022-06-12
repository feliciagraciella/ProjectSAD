<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LogInModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Session;
use Illuminate\Support\Facades\Session;

class LogInController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function getUserId(Request $request)
    // {
    //     $user = Auth::user(); // Retrieve the currently authenticated user...
    //     $id = Auth::id(); // Retrieve the currently authenticated user's ID...


    //     $user = $request->user(); // returns an instance of the authenticated user...
    //     $id = $request->user()->admin; // Retrieve the currently authenticated user's ID...


    //     $user = auth()->user(); // Retrieve the currently authenticated user...
    //     $id = auth()->id();  // Retrieve the currently authenticated user's ID...
    // }

    public function index()
    {
        return view('login', [
            "title" => "Log In"
        ]);
    }

    // public function authenticate(Request $request)
    // {
        // $credentials = $request->validate([
        //     'admin' => 'required',
        //     'password' => 'required'
        // ]);

        // if(Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/home');
        // }

        // return back()->with('Log in Error', 'Login failed');



    //     $request->validate([
    //         'admin' => ['required'],
    //         'password' => ['required'],
    //     ]);
    //     // if(Auth::attempt($adminid)){
    //     //     $request->session()->regenerate();
    //     //     return redirect()->intended('/home');
    //     // }
    //     $idadmin = $request->input('admin');
    //     $password = $request->input('password');
    //     $userdata = DB::table('ADMIN')->where('ID_ADMIN', $idadmin)->first();
    //     // dd($userdata);
    //     // $obj = get_object_vars($userdata);
    //     // $request->session()->put('idadmin', $obj['ID_ADMIN']);
    //     if (is_null($userdata)) {
    //         return back()->with('LoginError', 'Log In Failed');
    //     } else {
    //         $obj = get_object_vars($userdata);

    //         if ($password == $obj['PASSWORD_ADMIN']) {
    //             $request->session()->put('idadmin', $request->admin);

    //             return view('/home', [
    //                 'admin' => $idadmin,
    //                 'password' => $obj
    //             ]);
    //         } else {
    //             return back()->with('LoginError', 'Log In Failed');
    //         }
    //     }
    // }

    // public function manualLogin(){
    //     $user = LogInModel::find(1);
    //     Auth::login($user);
    //     return redirect('/home');
    // }


    public function authentication(Request $req)
    {
        $idadmin = $req->input('admin');
        $password = $req->input('password');
        $data1 = [
            'admin' => $idadmin,
            'password' => $password
        ];

        // dd($data1);

        $user = new LogInModel;
        $flag_exist = $user->isExist($data1);


        if ($flag_exist){
            //2.a. Jika KETEMU, maka session LOGIN dibuat
            Session::put('login', $idadmin);
            Session::put('pass', $password);
            Session::flash('success', 'Log In SUccesful!');
            $req->session()->flash('authentication');


            return redirect('/home');

        } else {
            //2.b. Jika TIDKA KETEMU, maka kembali ke LOGIN dan tampilkan PESAN
            Session::flash('error', 'Log In Failed!');
            return redirect('/');
        }

    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
