<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\CategoryModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category()
    {
        $cat = CategoryModel::all();

        return view("category", [
            "cat" => $cat
        ]);
    }

    public function insproduct()
    {
        $category = CategoryModel::select('C_NAME')->get();
        $size = ProductListModel::select('SIZE')->groupBy('SIZE')->get();
        return view('insertproduct', [
            "cat" => $category,
            'size' => $size
        ]);
    }
}
