<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\LihatDataModel;
// use App\Models\Report;
use app\Models\ReportModel;
use DB;

class LihatDataController extends Controller
{
    //
    // function __construct()
    // {
    //     $this->LihatDataModel = new LihatDataModel();
    // }

    public function report(){
        $dreport = "select * from most_popular_all";
        $data = Report::select($dreport);
        // $data = Report::query($dreport);

        return view("report", [
            "data" => $data
        ]);
    }

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
