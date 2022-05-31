<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use App\Models\TransactionDetailModel;
use App\Models\TransactionListModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransactionListController extends Controller
{
    public function translist()
    {
        $trans = TransactionListModel::orderBy('DATE_TRANSACTION', 'desc')->get();

        return view("transactionlist", [
            "trans" => $trans
        ]);
    }

    public function details($id)
    {
        $transdet = TransactionDetailModel::join('PRODUCT', 'DETAIL_TRANSACTION.SKU', '=', 'PRODUCT.SKU')
        ->select('DETAIL_TRANSACTION.SKU', 'P_NAME','IMAGE', 'QTY_PRODUCT')->where('ID_TRANSACTION', $id)->get();

        $trans = TransactionListModel::where('ID_TRANSACTION', $id)->get();


        return view("transactiondetail", [
            "transdet" => $transdet,
            "trans" => $trans,
            "id" => $id
        ]);
    }

    public function insert(Request $req)
    {

        $dd1 = $req->input("selectplatform");
        $dd2 = $req->input("selectplatform");
        $dd1 = $req->input("selectplatform");

        return view("inserttransaction", [
            "dd1" => $dd1
        ]);
    }

    public function dropdownproduct()
    {
        $product = ProductListModel::select('P_NAME', 'SKU')->get();

        return view("inserttransaction", [
            "product" => $product
        ]);
    }
}
