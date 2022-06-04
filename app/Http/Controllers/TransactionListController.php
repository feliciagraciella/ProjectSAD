<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
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

    // public function updateQty(Request $req)
    // {

    // }

    public function deleteAll()
    {
        DB::table('CART')->deleteAll();
    }

    public function dropdownproduct()
    {
        $product = ProductListModel::select(DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"), 'SKU')->get();
        $cart = DB::table('CART')->get();

        return view("inserttransaction", [
            "product" => $product,
            "cart" => $cart
        ]);
    }
}
