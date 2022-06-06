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
    //
    // function __construct()
    // {
    //     $this->LihatDataModel = new LihatDataModel();
    // }



    public function report()
    {
        $data = DB::select("select * from product_all_all");

        $income = DB::select("select fNetProfit() as `NetProfit`");

        $admin = DB::select("select fAdminFee() as `AdminFee`");
        // $dreport = "select * from most_popular_all ";
        return view("report", [
            "data" => $data,
            "income" => $income[0]->NetProfit,
            "admin" => $admin[0]->AdminFee,
            "reportname" => "Product Sales/All/All"
        ]);

    }

    public function report2(Request $req)
    {
        $report = $req->get("select_report");
        $platform = $req->get("select_platform");
        $period = $req->get("select_period");
        $reportname = $report."/".$platform."/".$period;
        // dd($reportname);
        if($report == "Product Sales"){
            if($platform == "All" && $period == "All"){
                $data = DB::select("select * from product_all_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "All" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_all_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($platform == "All" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "All"){
                $data = DB::select("select * from product_shopee_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_shopee_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Shopee" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_shopee_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "All"){
                $data = DB::select("select * from product_tokopedia_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 7 Days"){
                $data = DB::select("select * from product_tokopedia_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($platform == "Tokopedia" && $period == "Last 30 Days"){
                $data = DB::select("select * from product_tokopedia_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            // dd($report);
            return view("report", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee,
                "reportname" => $reportname
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

            return view("report2", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee,
                "reportname" => $reportname
            ]);
        }

    }
}
