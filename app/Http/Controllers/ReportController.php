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
        $income = DB::select("select fNetProfit() as `NetProfit`");
        $admin = DB::select("select fAdminFee() as `AdminFee`");

        foreach($data as $d){
            $namaproduk[] = (string)$d->PRODUCT_NAME;
            $jumlahproduk[] = (int)$d->TOTAL_SOLD;
        }

        // dd($namaproduk,$jumlahproduk);
        return view("report", [
            "data" => $data,
            "income" => $income[0]->NetProfit,
            "admin" => $admin[0]->AdminFee,
            "reportname" => "Product Sales Report",
            "reportsub" => "All Period on All Platform",
            "namaproduk" => $namaproduk,
            "jumlahproduk" => $jumlahproduk,
            "totalsold" => $totalsold[0]->SUM
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

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_all_seven");
                $totalsold = DB::table('product_all_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_all_thirty");
                $totalsold = DB::table('product_all_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data = DB::select("select * from product_shopee_all");
                $totalsold = DB::table('product_shopee_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_shopee_seven");
                $totalsold = DB::table('product_shopee_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_shopee_thirty");
                $totalsold = DB::table('product_shopee_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data = DB::select("select * from product_tokopedia_all");
                $totalsold = DB::table('product_tokopedia_all')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_tokopedia_seven");
                $totalsold = DB::table('product_tokopedia_seven')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_tokopedia_thirty");
                $totalsold = DB::table('product_tokopedia_thirty')->select(DB::raw('SUM(TOTAL_SOLD) as `SUM`'))->get();
                $income = DB::select("select fNetProfit() as `NetProfit`");

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
                "totalsold" => $totalsold[0]->SUM
            ]);
        }

        if($report == "Finance"){
            if($platform == "All" && $period == "All"){
                $data = DB::select("select * from finance_all_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data = DB::select("select * from finance_all_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }

            foreach($data as $d){
                $tanggal[] = $d->DATE_TRANSACTION;
                $profit[] = (int)$d->NET_PROFIT;
            }

            return view("report2", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee,
                "reportname" => $reportname,
                "reportsub" => $reportsub,
                "tanggal" => $tanggal,
                "profit" => $profit
            ]);
        }

    }
}
