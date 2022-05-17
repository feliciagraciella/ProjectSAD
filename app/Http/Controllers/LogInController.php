<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $request->validate([
            'admin' => ['required'],
            'password' => ['required'],
        ]);
        $admin = $request->admin;
        $password = $request->password;
        $userdata = DB::table('ADMIN')->where('ID_ADMIN', $admin)->first();
        if (is_null($userdata)) {
            return back()->with('LoginError', 'Log In Failed');
        } else {
            $obj = get_object_vars($userdata);
            if ($password == $obj['PASSWORD_ADMIN']) {
                $request->session()->put('admin', $obj['ID_ADMIN']);

                // //titip buat id pembeli
                $idAdmin = $obj['ID_ADMIN'];
                $request->session()->put('idAdmin', $obj['ID_ADMIN']);
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
