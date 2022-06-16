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
        $income = DB::select("select fNetProfit('All','Last 7 Days') as `NetProfit`");
        $admin = DB::select("select fAdminFee('All','Last 7 Days') as `AdminFee`");
        $stock = DB::select("select SKU, P_NAME, STOCK from PRODUCT where STOCK <= 10 order by STOCK asc");

        $shopee = DB::select("select * from finance_shopee_thirty");
        $color2 = "#F15412";

        $tokped = DB::select("select * from finance_tokopedia_thirty");
        $color1 = "#5FD068";

        foreach($shopee as $sh){
            $intprofit2[] = (int)$sh->INT_NET_PROFIT;
            $tanggal2[] = $sh->DATE_TRANSACTION;
        }
        foreach($tokped as $t){
            $intprofit1[] = (int)$t->INT_NET_PROFIT;
            $tanggal1[] = $t->DATE_TRANSACTION;
        }

        return view("home", [
            "data" => $data
                ->take(4),
            "product" => $product,
            "stock" => $stock,
            "income" => $income[0]->NetProfit,
            "admin" => $admin[0]->AdminFee,
            "shopee" => $intprofit2,
            "tokped" => $intprofit1,
            "color1" => $color1,
            "color2" => $color2,
            "tanggal1" => $tanggal1,
            "tanggal2" => $tanggal2
        ]);
    }

}
