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
        $income = DB::select("select FORMAT(sum(NET_PRICE),2) as `NetProfit` from TRANSACTION where DATE_TRANSACTION >= (NOW()-INTERVAL 7 DAY)");
        $admin = DB::select("select FORMAT(sum(TOTAL_FEE),2) as `AdminFee` from TRANSACTION where DATE_TRANSACTION >= (NOW()-INTERVAL 7 DAY)");
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

    public function report2(Request $req)
    {
        $report = $req->get("select_report");
        $platform = $req->get("select_platform");
        $period = $req->get("select_period");
        $reportname = $report." Report";
        $reportsub = $period." Period on ".$platform." Platform";
        // dd($reportsub);
        if($report == "Product Sales"){
            if($platform == "All" && $period == "All"){
                $data = DB::select("select * from product_all_all");
                $totalsold = DB::table('product_all_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#4B5D67";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_all_seven");
                $totalsold = DB::table('product_all_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#4B5D67";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_all_thirty");
                $totalsold = DB::table('product_all_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#4B5D67";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data = DB::select("select * from product_shopee_all");
                $totalsold = DB::table('product_shopee_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#F15412";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_shopee_seven");
                $totalsold = DB::table('product_shopee_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#F15412";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_shopee_thirty");
                $totalsold = DB::table('product_shopee_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#F15412";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data = DB::select("select * from product_tokopedia_all");
                $totalsold = DB::table('product_tokopedia_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#5FD068";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_tokopedia_seven");
                $totalsold = DB::table('product_tokopedia_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#5FD068";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_tokopedia_thirty");
                $totalsold = DB::table('product_tokopedia_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $color = "#5FD068";
                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            // dd($report);

            foreach($data as $d){
                $namaproduk[] = $d->PRODUCT_NAME;
                $jumlahproduk[] = (int)$d->TOTAL_SOLD;
            }
            // dd($namaproduk);
            return view("report", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee,
                "reportname" => $reportname,
                "reportsub" => $reportsub,
                "namaproduk" => $namaproduk,
                "jumlahproduk" => $jumlahproduk,
                "totalsold" => $totalsold[0]->SUM,
                "color" => $color,
                "platform" => $platform
            ]);
        }

        #data1 = tabel, data2 = garis 1, data3 = garis 2
        if($report == "Finance"){
            if($platform == "All" && $period == "All"){
                $data1 = DB::select("select * from finance_all_all");
                $data2 = DB::select("select * from finance_shopee_all");
                $data3 = DB::select("select * from finance_tokopedia_all");
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_all_seven");
                $data2 = DB::select("select * from finance_shopee_seven");
                $data3 = DB::select("select * from finance_tokopedia_seven");
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_all_thirty");
                $data2 = DB::select("select * from finance_shopee_thirty");
                $data3 = DB::select("select * from finance_tokopedia_thirty");
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data1 = DB::select("select * from finance_shopee_all");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_shopee_seven");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_shopee_thirty");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data1 = DB::select("select * from finance_tokopedia_all");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#5FD068";
                $color2 = "#FFFFFF";
                $platform1 = "Tokopedia";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_tokopedia_seven");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#5FD068";
                $color2 = "#FFFFFF";
                $platform1 = "Tokopedia";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_tokopedia_thirty");
                $data2 = $data1;
                $data3 = $data1;
                $income = DB::select("select fNetProfit() as `NetProfit`");
                $admin = DB::select("select fAdminFee() as `AdminFee`");
                $color1 = "#5FD068";
                $color2 = "#FFFFFF";
                $platform1 = "Tokopedia";
                $platform2 = "";
            }

            // masukin data 2 ke garis 1
            foreach($data2 as $d){
                $intprofit1[] = (int)$d->INT_NET_PROFIT;
            }
            foreach($data1 as $d){
                $tanggal1[] = $d->DATE_TRANSACTION;
            }

            if($platform == "All"){
                foreach($data3 as $d){
                    // masukin data 3 ke garis 2
                    $intprofit2[] = (int)$d->INT_NET_PROFIT;
                }
            }
            else{
                foreach($data3 as $d){
                    $intprofit2[] = "";
                }
            }
            // dd($tanggal1);
            return view("report2", [
                "data1" => $data1,
                "data2" => $data2,
                "data3" => $data3,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee,
                "reportname" => $reportname,
                "reportsub" => $reportsub,
                "tanggal1" => $tanggal1,
                "intprofit1" => $intprofit1,
                "intprofit2" => $intprofit2,
                "platform1" => $platform1,
                "platform2" => $platform2,
                "color1" => $color1,
                "color2" => $color2
            ]);
        }

    }

}
