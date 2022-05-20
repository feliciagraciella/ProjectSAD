<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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
        $product = ProductListModel::all();

        return view("home", [
            "product" => $product
        ]);
    }
}
