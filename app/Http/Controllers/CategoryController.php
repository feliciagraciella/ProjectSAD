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
    public function category(Request $request)
    {
        $cat = CategoryModel::all();

        $idcat = DB::select('select `fID_Cat`()');
        $obj = get_object_vars($idcat[0]);
        DB::table('CATEGORY')->insert([
            'ID_CATEGORY' => $obj['`fID_Cat`()'],
            'C_NAME' => $request->input('name'),
            'TOTAL_PRODUCT' => 0,
            'STATUS_DELETE' => 0
        ]);

        // return redirect('category')->with('status',"Insert successfully");
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
