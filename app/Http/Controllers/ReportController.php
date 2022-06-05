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
            "admin" => $admin[0]->AdminFee
        ]);

    }

    public function report2(Request $req)
    {
        $kuery = $req->query();

        // $report = "product_sales";
        // $platform = "all";
        // $period = "all";
        // dd($kuery["select_report"]);

        if(!empty($kuery["select_report"])){
            $report = $kuery["select_report"];
        }
        if(!empty($kuery["select_platform"])){
            $platform = $kuery["select_platform"];
        }
        if(!empty($kuery["select_period"])){
            $period = $kuery["select_period"];
        }
        else{
            $report = "product_sales";
            $platform = "all";
            $period = "all";
        }

        if($report == "product_sales"){
            if($report == "product_sales" && $platform == "all" && $period == "all"){
                $data = DB::select("select * from product_all_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "all" && $period == "seven"){
                $data = DB::select("select * from product_all_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($report == "product_sales" && $platform == "all" && $period == "thirty"){
                $data = DB::select("select * from product_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "shopee" && $period == "all"){
                $data = DB::select("select * from product_shopee_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "shopee" && $period == "seven"){
                $data = DB::select("select * from product_shopee_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "shopee" && $period == "thirty"){
                $data = DB::select("select * from product_shopee_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "tokopedia" && $period == "all"){
                $data = DB::select("select * from product_tokopedia_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "tokopedia" && $period == "seven"){
                $data = DB::select("select * from product_tokopedia_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "product_sales" && $platform == "tokopedia" && $period == "thirty"){
                $data = DB::select("select * from product_tokopedia_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            // dd($report);
            return view("report", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee
            ]);
        }

        if($report == "finance"){
            if($report == "finance" && $platform == "all" && $period == "all"){
                $data = DB::select("select * from finance_all_all");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "all" && $period == "seven"){
                $data = DB::select("select * from finance_all_seven");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
                // dd($data);
            }
            elseif($report == "finance" && $platform == "all" && $period == "thirty"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "shopee" && $period == "all"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "shopee" && $period == "seven"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "shopee" && $period == "thirty"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "tokopedia" && $period == "all"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "tokopedia" && $period == "seven"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }
            elseif($report == "finance" && $platform == "tokopedia" && $period == "thirty"){
                $data = DB::select("select * from finance_all_thirty");

                $income = DB::select("select fNetProfit() as `NetProfit`");

                $admin = DB::select("select fAdminFee() as `AdminFee`");
            }

            return view("report2", [
                "data" => $data,
                "income" => $income[0]->NetProfit,
                "admin" => $admin[0]->AdminFee
            ]);
        }
        dd($report, $platform, $period);
    }
}
