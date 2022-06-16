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


        if ($date == null)
        {
            return redirect('inserttransaction')->with("error", "Select date!");
        }
        else if ($platformname == null)
        {
            return redirect('inserttransaction')->with("error", "Select platform");
        }
        else if ($date == null && $platformname == null)
        {
            return redirect('inserttransaction')->with("error", "Select date and platform");
        }

        if($dd2 == null)
        {
            return redirect('inserttransaction')->with("error", "Select product!");
        }

        if ($qty == 0){
            return redirect('inserttransaction')->with("error", "Quantity must be more than 0");
        }

        else if(count($stok) != 0 && $qty > $stok[0]->STOCK){
            return redirect('inserttransaction')->with("error", "Quantity cannot exceed the stock quantity");
        }
        else if($qty > 0){
            CartModel::updateCart($dd2, $dd1, $date, $id, $p, $qty);
            return redirect('inserttransaction')->with("success", "Succefully added to cart");
        }
    }

    public function insertTrans(Request $req)
    {
        $trans = DB::table('CART')->select('ID_TRANSACTION', 'DATE', 'PLATFORM')->where('ID_ADMIN', session('login'))->groupBy('ID_TRANSACTION', 'DATE', 'PLATFORM')->limit(1)->get();

        $totalqty = DB::table('CART')->select(DB::raw('SUM(QTY_PRODUCT) as `SUM`'))->where('ID_ADMIN', session('login'))->get();

        $totalprice = $req->input("p");
        $totalfee = $req->input("insertfee");

        $transada = TransactionListModel::select('ID_TRANSACTION')->where('ID_TRANSACTION', $trans[0]->ID_TRANSACTION)->get();

        if(count($transada)!=0)
        {
            DB::table('CART')->where('ID_ADMIN', session('login'))->delete();
            return redirect('inserttransaction')->with("error", "Transaction in this date already exist!");

        }

        if($totalprice != null && $totalfee != null && is_numeric($totalprice) && is_numeric($totalfee) && count($trans)!=0)
        {
            $transdet = DB::table('CART')->where('ID_ADMIN', session('login'))->get();

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

            DB::table('CART')->where('ID_ADMIN', session('login'))->delete();

            return redirect('inserttransaction')->with("success", "Transaction is successfull!");
        }
        else
        {
            return redirect('inserttransaction')->with("error", "Transaction is not successfull!");
        }


    }

    public function deleteAll()
    {
        $cartt=DB::table('CART')->where('ID_ADMIN', session('login'))->get();
        // dd($cartt);
        DB::table('CART')->where('ID_ADMIN', session('login'))->delete();

        return redirect('inserttransaction')->with("success", "Successfully deleted!");
    }

    public function dropdownproduct()
    {
        $product = ProductListModel::select(DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"), 'SKU')->get();
        $cart = DB::table('CART')->join('PRODUCT', 'CART.SKU', '=', 'PRODUCT.SKU')
        ->select('CART.ID_TRANSACTION', 'CART.DATE', 'CART.PLATFORM', 'CART.QTY_PRODUCT', 'CART.SKU', DB::raw("CONCAT(P_NAME, ' ', SIZE, 'mL') AS NAME"))->where('ID_ADMIN', session('login'))->get();
        // $platform = DB::table('CART')->select('PLATFORM')->limit(1)->get();

        // dd($cart);
        if(count($cart)!=0){
            $platform = DB::table('CART')->select('PLATFORM')->where('ID_ADMIN', session('login'))->limit(1)->get();
            $platformname = $platform[0]->PLATFORM;
            $date = DB::table('CART')->select('DATE')->where('ID_ADMIN', session('login'))->limit(1)->get();
            $datee = $date[0]->DATE;
            $disable = "disabled";
        }
        else{
            $platformname = "Select Platform";
            $datee = "YYYY/MM/DD";
            $disable = "";
        }

        return view("inserttransaction", [
            "product" => $product,
            "cart" => $cart,
            "platform" => $platformname,
            "date" => $datee,
            "disable" => $disable
        ]);
    }

    public function deleteCart(Request $request)
    {
        $id = $request->input("deletecart");

        // $cart = DB::table('CART')->where('SKU', $id)->get();

        DB::table('CART')->where('SKU', $id)->where('ID_ADMIN', session('login'))->delete();

        return redirect('inserttransaction')->with("success", "Successfully deleted " . $id);
    }

    public function deletetrans(Request $request)
    {
        // dd(session('idtransdet'));
        DB::table('TRANSACTION')->where('ID_TRANSACTION', session('idtransdet'))->delete();
        DB::table('DETAIL_TRANSACTION')->where('ID_TRANSACTION', session('idtransdet'))->delete();

        return redirect('transactionlist')->with("success", "Transaction successfully deleted!");
    }
}
