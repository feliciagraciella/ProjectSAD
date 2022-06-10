<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ReportModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('/home');
    }

    public function reporthome()
    {
        $product = DB::select("select * from `product_all_all` order by SKU asc limit 5");
        $data = ReportModel::all();
        $income = DB::select("select fNetProfit() as `NetProfit`");
        $admin = DB::select("select fAdminFee() as `AdminFee`");
        $stock = DB::select("select P_NAME, STOCK from PRODUCT where STOCK <= 10 order by STOCK asc");

        return view("home", [
            "data" => $data
                ->take(4),
            "product" => $product,
            "stock" => $stock,
            "income" => $income[0]->NetProfit,
            "admin" => $admin[0]->AdminFee
        ]);
    }

    

}
