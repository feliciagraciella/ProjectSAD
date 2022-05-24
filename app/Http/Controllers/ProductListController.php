<?php

namespace App\Http\Controllers;

use App\Models\DetailTransModel;
use App\Models\ProductListModel;
use App\Http\Controllers\SUM;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ProductListController extends Controller
{
    public function productlist()
    {
        $product = ProductListModel::all();

        return view("product", [
            "product" => $product
        ]);
    }

    public function productlisthome()
    {
        // $sales = DetailTransModel::all()
        //     ->select('SKU', 'sum(QTY_PRODUCT)')
        //     ->groupBy('SKU')
        //     ->where('DETAIL_TRANSACTION.SKU', '=', 'PRODUCT.SKU')
        //     ->get();

        $product = ProductListModel::all();
        // ->join('DETAIL_TRANSACTION', 'PRODUCT.SKU', '=', 'DETAIL_TRANSACTION.SKU')
        // ->select('PRODUCT.*', SUM('DETAIL_TRANSACTION'.'QTY_PRODUCT'))
        // ->groupBy('SKU')
        // ->orderBy(SUM('DETAIL_TRANSACTION'.'QTY_PRODUCT'), 'desc')
        // ->get();

        // $sales = DB::table('DETAIL_TRANSACTION')
        //     ->select(DB::raw('SKU', 'SUM(QTY_PRODUCT)'))
        //     ->where('DETAIL_TRANSACTION.SKU', '=', 'PRODUCT_SKU')
        //     ->orderBy('SUM(QTY_PRODUCT)', 'desc')
        //     ->get();

        // $product = DB::table('PRODUCT')
        //     ->join('DETAIL_TRANSACTION', 'PRODUCT.SKU', '=', 'DETAIL_TRANSACTION.SKU')
        //     ->select('PRODUCT.*', DB::raw("SUM('DETAIL_TRANSACTION'.'QTY_PRODUCT')"))
        //     ->groupBy('SKU')
        //     ->orderBy(DB::raw("SUM('DETAIL_TRANSACTION'.'QTY_PRODUCT')"))
        //     ->get();

        // $product = DB::table('PRODUCT')
        //         ->select('PRODUCT.SKU', 'ID_CATEGORY', 'P_NAME', 'SIZE', 'PRICE', 'STOCK', 'DESCRIPTION', 'IMAGE', DB::raw('IFNULL'(SUM('DETAIL_TRANSACTION.QTY_PRODUCT'), 0))
        //         ->leftJoin('DETAIL_TRANSACTION','PRODUCT.SKU','=','DETAIL_TRANSACTION.SKU')
        //         ->where('PRODUCT.STATUS_DELETE','=',0)
        //         ->groupBy('PRODUCT.SKU','ID_CATEGORY','P_NAME','SIZE','PRICE','STOCK','DESCRIPTION','IMAGE')
        //         ->get();

        return view("home", [
            "product" => $product
                ->take(5)
        ]);
    }
}
