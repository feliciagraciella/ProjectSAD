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

    // public function index()
    // {
    //     return view('login', [

    //     ]);
    // }

    public function authentication(Request $req)
    {
        $idadmin = $req->input('admin');
        $password = $req->input('password');
        $data1 = [
            'admin' => $idadmin,
            'password' => $password
        ];

        $user = new LogInModel;
        $flag_exist = $user->isExist($data1);


        if ($flag_exist){
            Session::put('login', $idadmin);
            Session::put('pass', $password);
            $req->session()->flash('authentication');


            return redirect('/home');

        } else {
            return redirect('/')->with('error', 'Log In Failed!');
        }

    }

    public function logout(Request $request){
        Session::flush();
        return redirect('/');
    }
}
