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
        $request->validate([
            'idadmin' => ['required'],
            'password' => ['required'],
        ]);
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

                // return view('/', [
                //     'idadmin' => $idadmin,
                //     'userdata' => $obj
                // ]);

                // //titip buat id pembeli
                // $idAdmin = $obj['ID_ADMIN'];
                // $request->session()->put('idAdmin', $obj['ID_ADMIN']);
                // $request->session()->put('idPembeli', $obj['ID_PEMBELI']);

                // if (!is_null($orders)) {
                //     $obj = get_object_vars($orders);
                //     $request->session()->put('orders', $obj['ID_TB']);
                //     $request->session()->put('total', $obj['TOTAL_BAYAR']);
                //     return view(
                //         'home-sign-in',
                //         ["bestseller" => $bestseller,
                //         'title' => 'Home']
                //     );
                // }
                // else {
                //     $request->session()->put('orders', '');

                //     return view(
                //         'home-sign-in',
                //         ["bestseller" => $bestseller,'title' => 'Home']
                //     );
                // }
            } else {
                return back()->with('LoginError', 'Log In Failed');
            }
        }
    }
}
