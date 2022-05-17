<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $adminID = session('idAdmin')
        // $admin = DB::table('ADMIN')
        //     ->where('ID_PEMBELI', session('idAdmin'));
    }

}
