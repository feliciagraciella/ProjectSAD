<?php

namespace App\Http\Controllers;

use App\Models\DetailTransModel;
use App\Models\ProductListModel;
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
        // ->select('PRODUCT.*', 'sum(DETAIL_TRANSACTION.QTY_PRODUCT)')
        // ->join('DETAIL_TRANSACTION', 'PRODUCT.SKU', '=', 'DETAIL_TRANSACTION.SKU')
        // ->where('PRODUCT.SKU', '=', 'DETAIL_TRANSACTION.SKU')
        // ->groupBy('SKU')
        // ->orderBy('sum(DETAIL_TRANSACTION.QTY_PRODUCT)', 'desc')
        // ->get();

        // $sales = DB::table('DETAIL_TRANSACTION')
        //     ->select(DB::raw('SKU', 'SUM(QTY_PRODUCT)'))
        //     ->where('DETAIL_TRANSACTION.SKU', '=', 'PRODUCT_SKU')
        //     ->orderBy('SUM(QTY_PRODUCT)', 'desc')
        //     ->get();

        return view("home", [
            "product" => $product
                ->take(5),
            // "sales" => $sales
            //     ->take(4)
        ]);
    }

    // public function total_sales()
    // {
    //     $product = ProductListModel::all();

    //     return view("home", [
    //         "product" => $product

    //             ->take(5)
    //     ]);
    // }
}
