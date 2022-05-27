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
        $data = ReportModel::all();

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
        dd($kuery);
        // dd($report);

        // $data = ReportModel::all();

        // $income = DB::select("select fNetProfit() as `NetProfit`");

        // $admin = DB::select("select fAdminFee() as `AdminFee`");

        // return view("report", [
        //     "data" => $data,
        //     "income" => $income[0]->NetProfit,
        //     "admin" => $admin[0]->AdminFee
        // ]);

    }


    // public function reporthome()
    // {
    //     $data = ReportModel::all();

    //     $income = DB::select("select fNetProfit() as `NetProfit`");

    //     $admin = DB::select("select fAdminFee() as `AdminFee`");

    //     return view("home", [
    //         "data" => $data
    //             ->take(4),
    //         "income" => $income[0]->NetProfit,
    //         "admin" => $admin[0]->AdminFee
    //     ]);
    // }

    // public function view_data(Request $request){
    //     $nm = $request->nmtable;

    //     if($nm == 'customer') {
    //         $customer = $this ->LihatDataModel->get_cust();
    //         return view('lihatdatacust', ['customer' => $customer]);
    //     }
    //     elseif($nm == 'item') {
    //         $item = $this ->LihatDataModel->get_item();
    //         return view('lihatdataitem', ['item' => $item]);
    //     }
    //     elseif($nm == 'trans_header') {
    //         $transhead = $this ->LihatDataModel->get_transhead();
    //         return view('lihatdatatranshead', ['transhead' => $transhead]);
    //     }
    //     elseif($nm == 'trans_detail') {
    //         $transdet = $this ->LihatDataModel->get_transdet();
    //         return view('lihatdatatransdet', ['transdet' => $transdet]);
    //     }
    // }
}
