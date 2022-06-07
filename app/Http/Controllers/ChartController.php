<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function googleLineChart()
    {
        // $data = DB::select("select * from finance_all_all");

        // $result[] = ['Month','Net Profit'];
        // foreach ($data as $key => $value) {
        //     $result[++$key] = [$value->MONTH, (int)$value->NET_PROFIT];
        // }

        // return view('google-line-chart')
        //         ->with('data',json_encode($result));

        // dd($data);
    }
}
