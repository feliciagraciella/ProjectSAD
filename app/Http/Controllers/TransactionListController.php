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
use Illuminate\Support\Facades\Session;
use PDO;

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

        Session::put('idtransdet', $id);

        return view("transactiondetail", [
            "transdet" => $transdet,
            "trans" => $trans,
            "id" => $id
        ]);
    }

    public function addCart(Request $req)
    {
        $date = $req->input("date");

        $cart = DB::table('CART')->get();
        if(count($cart)!=0){
            $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();
            $platformname = $platform[0]->PLATFORM;
        }
        else{
            $platformname = $req->input("selectplatform");
        }


        if($platformname == "Tokopedia"){
            $dd1 = "Tokopedia";
        }
        else{
            $dd1 = "Shopee";
        }

        if ($dd1 == "Tokopedia" || $platformname == "Tokopedia"){
            $id = "T" . date('Ymd', strtotime($date));
        }
        else {
            $id = "S" . date('Ymd', strtotime($date));
        }

        $dd2 = $req->input("product");
        $qty = $req->get("inputQuantity");

        $p = DB::table('PRODUCT')->where('SKU', $dd2);

        $stok = DB::table('PRODUCT')->select('STOCK')->where('SKU', $dd2)->get();


        if ($qty == 0){
            return redirect('inserttransaction')->back()->with("error", "Quantity must be more than 0");
        }
        else if($qty > $stok[0]->STOCK){
            return redirect('inserttransaction')->back()->with("error", "Quantity cannot exceed the stock quantity");
        }
        else if($qty > 0){
            CartModel::updateCart($dd2, $dd1, $date, $id, $p, $qty);
            return redirect()->back()->with("success", "Succefully added to cart");
        }



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
        $validatedData = $req->validate([
            'p' => ['required', 'numeric'],
            'insertfee' => ['required', 'numeric'],
        ]);

        $trans = DB::table('CART')->select('ID_TRANSACTION', 'DATE', 'PLATFORM')->groupBy('ID_TRANSACTION', 'DATE', 'PLATFORM')->limit(1)->get();

        $totalqty = DB::table('CART')->select(DB::raw('SUM(QTY_PRODUCT) as `SUM`'))->get();
        $totalprice = $req->input("p");
        $totalfee = $req->input("insertfee");


        // dd($totalprice);

        $transdet = DB::table('CART')->get();

        // dd($transdet[0]->SKU);
        TransactionListModel::insert([
            'DATE_TRANSACTION' => $trans[0]->DATE,
            'ID_ADMIN' => session('login'),
            'ID_TRANSACTION' => $trans[0]->ID_TRANSACTION,
            'NET_PRICE' => $totalprice - $totalfee,
            'PLATFORM' => $trans[0]->PLATFORM,
            'STATUS_DELETE' => '0',
            'TOTAL_FEE' => $totalfee,
            'TOTAL_PRICE' => $totalprice,
            'TOTAL_QTY' => $totalqty[0]->SUM
        ]);


        foreach ($transdet as $td)
        {
            TransactionDetailModel::insert([
                'SKU' => $td->SKU,
                'ID_TRANSACTION' => $td->ID_TRANSACTION,
                'QTY_PRODUCT' => $td->QTY_PRODUCT,
                'STATUS_DELETE' => '0'
            ]);
        }

        // for ($x = 0; $x < count($transdet); $x++) {
        //     TransactionDetailModel::insert([
        //         'SKU' => $transdet[$x]->SKU,
        //         'ID_TRANSACTION' => $transdet[$x]->ID_TRANSACTION,
        //         'QTY_PRODUCT' => $transdet[$x]->QTY_PRODUCT,
        //         'STATUS_DELETE' => '0'
        //     ]);
        //   }

        DB::table('CART')->delete();

        return redirect('inserttransaction');
    }

    public function deleteAll()
    {
        DB::table('CART')->where('ID_ADMIN', session('login'))->delete();

        return redirect('inserttransaction');
    }

    public function dropdownproduct()
    {
        $product = ProductListModel::select(DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"), 'SKU')->get();
        $cart = DB::table('CART')->join('PRODUCT', 'CART.SKU', '=', 'PRODUCT.SKU')
        ->select('CART.ID_TRANSACTION', 'CART.DATE', 'CART.PLATFORM', 'CART.QTY_PRODUCT', 'CART.SKU', DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"))->where('ID_ADMIN', session('login'))->get();
        // $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();

        if(count($cart)!=0){
            $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();
            $platformname = $platform[0]->PLATFORM;
            $date = DB::table('CART')->select('DATE')->limit(1)->get();
            $datee = $date[0]->DATE;
        }
        else{
            $platformname = "Select Platform";
            $datee = "YYYY/MM/DD";
        }

        return view("inserttransaction", [
            "product" => $product,
            "cart" => $cart,
            "platform" => $platformname,
            "date" => $datee
        ]);
    }

    public function deleteCart(Request $request)
    {
        $id = $request->input("deletecart");

        // $cart = DB::table('CART')->where('SKU', $id)->get();

        DB::table('CART')->where('SKU', $id)->where('ID_ADMIN', session('login'))->delete();

        return redirect('inserttransaction');
    }

    public function deletetrans(Request $request)
    {
        dd(session('idtransdet'));
        DB::table('TRANSACTION')->where('ID_TRANSACTION', )->delete();
        DB::table('DETAIL_TRANSACTION')->where('ID_TRANSACTION', )->delete();

        return redirect('inserttransaction');
    }
}
