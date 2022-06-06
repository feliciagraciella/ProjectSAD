<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\ProductListModel;
use App\Models\TransactionDetailModel;
use App\Models\TransactionListModel;
use Illuminate\Cache\RedisTaggedCache;
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

    public function addCart(Request $req)
    {
        $date = $req->input("date");
        $dd1 = $req->get("selectplatform");

        if ($dd1 == "Tokopedia"){
            $id = "T" . date('Ymd', strtotime($date));;
        }
        else {
            $id = "S" . date('Ymd', strtotime($date));
        }

        $dd2 = $req->input("product");
        $qty = $req->get("inputQuantity");

        $p = DB::table('PRODUCT')->where('SKU', $dd2);
        CartModel::updateCart($dd2, $dd1, $date, $id, $p, $qty);


        // DB::table('CART')->insert([
        //     'ID_TRANSACTION' => $id,
        //     'DATE' => $date,
        //     'PLATFORM' => $dd1,
        //     'SKU' => $dd2,
        //     'QTY_PRODUCT' => $qty,
        //     'STATUS_DELETE' => '0'
        // ]);

        return redirect('inserttransaction');
        // return view("inserttransaction", [
        //     "dd1" => $dd1
        // ]);
    }

    public function insertTrans(Request $req)
    {
        $trans = DB::table('CART')->select('ID_TRANSACTION', 'DATE', 'PLATFORM')->groupBy('ID_TRANSACTION')->get();
        $totalprice = $req->input("insertprice");
        $totalqty = DB::table('CART')->select(DB::raw('SUM(QTY_PRODUCT)'))->get();
        $totalfee = $req->input("insertfee");


        DB::table('TRANSACTION')->insert([
            'DATE_TRANSACTION' => $trans->DATE,
            'ID_ADMIN' => 'A001',
            'ID_TRANSACTION' => $trans->ID_TRANSACTION,
            'NET_PRICE' => $totalprice - $totalfee,
            'PLATFORM' => $trans->PLATFORM,
            'STATUS_DELETE' => '0',
            'TOTAL_FEE' => $totalfee,
            'TOTAL_PRICE' => $totalprice,
            'TOTAL_QTY' => $totalqty
        ]);

        return redirect('inserttransaction');
    }

    public function deleteAll()
    {
        DB::table('CART')->delete();

        return redirect('inserttransaction');
    }

    public function dropdownproduct()
    {
        $product = ProductListModel::select(DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"), 'SKU')->get();
        $cart = DB::table('CART')->get();
        // $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();

        if(count($cart)!=0){
            $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();
            $platformname = $platform[0]->PLATFORM;
            $date = DB::table('CART')->select('DATE')->limit(1)->get();
            $datee = $date[0]->DATE;
        }
        else{
            $platform = "Select Platform";
            $date = "";
        }

        return view("inserttransaction", [
            "product" => $product,
            "cart" => $cart,
            "platform" => $platformname,
            "date" => $datee
        ]);
    }
}
