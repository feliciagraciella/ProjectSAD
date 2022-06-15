<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionListModel;
// use App\Models\Report;
use App\Models\ReportModel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report()
    {
        $data = DB::select("select * from product_all_all");
        $totalsold = DB::table('product_all_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
        $income = DB::select("select fNetProfit('All', 'All') as `NetProfit`");
        $admin = DB::select("select fAdminFee('All', 'All') as `AdminFee`");

        foreach($data as $d){
            $namaproduk[] = (string)$d->PRODUCT_NAME;
            $jumlahproduk[] = (int)$d->TOTAL_SOLD;
        }

        // dd($income,$admin);
        return view("report", [
            "data" => $data,
            "income" => $income[0]->NetProfit,
            "admin" => $admin[0]->AdminFee,
            "reportname" => "Product Sales Report",
            "reportsub" => "All Period on All Platform",
            "namaproduk" => $namaproduk,
            "jumlahproduk" => $jumlahproduk,
            "totalsold" => $totalsold[0]->SUM,
            "platform" => "All",
            "color" => "#4B5D67"
        ]);

    }

    public function report2(Request $req)
    {
        $report = $req->get("select_report");
        $platform = $req->get("select_platform");
        $period = $req->get("select_period");
        $reportname = $report." Report";
        $reportsub = $period." Period on ".$platform." Platform";
        $income = DB::select("select fNetProfit('".$platform."','".$period."') as `NetProfit`");
        $admin = DB::select("select fAdminFee('".$platform."','".$period."') as `AdminFee`");
        // dd($reportsub);
        if($report == "Product Sales"){
            if($platform == "All" && $period == "All"){
                $data = DB::select("select * from product_all_all");
                $totalsold = DB::table('product_all_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#4B5D67";
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_all_seven");
                $totalsold = DB::table('product_all_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#4B5D67";
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_all_thirty");
                $totalsold = DB::table('product_all_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#4B5D67";
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data = DB::select("select * from product_shopee_all");
                $totalsold = DB::table('product_shopee_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#F15412";
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_shopee_seven");
                $totalsold = DB::table('product_shopee_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#F15412";
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_shopee_thirty");
                $totalsold = DB::table('product_shopee_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#F15412";
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data = DB::select("select * from product_tokopedia_all");
                $totalsold = DB::table('product_tokopedia_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#5FD068";
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_tokopedia_seven");
                $totalsold = DB::table('product_tokopedia_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#5FD068";
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_tokopedia_thirty");
                $totalsold = DB::table('product_tokopedia_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $color = "#5FD068";
            }

            foreach($data as $d){
                $namaproduk[] = $d->PRODUCT_NAME;
                $jumlahproduk[] = (int)$d->TOTAL_SOLD;
            }

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
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_all_seven");
                $data2 = DB::select("select * from finance_shopee_seven");
                $data3 = DB::select("select * from finance_tokopedia_seven");
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_all_thirty");
                $data2 = DB::select("select * from finance_shopee_thirty");
                $data3 = DB::select("select * from finance_tokopedia_thirty");
                $color1 = "#F15412";
                $color2 = "#5FD068";
                $platform1 = "Shopee";
                $platform2 = "Tokopedia";
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data1 = DB::select("select * from finance_shopee_all");
                $data2 = $data1;
                $data3 = $data1;
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_shopee_seven");
                $data2 = $data1;
                $data3 = $data1;
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_shopee_thirty");
                $data2 = $data1;
                $data3 = $data1;
                $color1 = "#F15412";
                $color2 = "#FFFFFF";
                $platform1 = "Shopee";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data1 = DB::select("select * from finance_tokopedia_all");
                $data2 = $data1;
                $data3 = $data1;
                $color1 = "#5FD068";
                $color2 = "#FFFFFF";
                $platform1 = "Tokopedia";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data1 = DB::select("select * from finance_tokopedia_seven");
                $data2 = $data1;
                $data3 = $data1;
                $color1 = "#5FD068";
                $color2 = "#FFFFFF";
                $platform1 = "Tokopedia";
                $platform2 = "";
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data1 = DB::select("select * from finance_tokopedia_thirty");
                $data2 = $data1;
                $data3 = $data1;
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
