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
        $idcat = DB::select('select `fID_Cat`()');
        $obj = get_object_vars($idcat[0]);
        DB::table('CATEGORY')->insert([
            'ID_CATEGORY' => $obj['`fID_Cat`()'],
            'C_NAME' => $request->input('name'),
            'TOTAL_PRODUCT' => 0,
            'STATUS_DELETE' => 0
        ]);

        return redirect('category')->with('status',"Insert successfully");
    }

    public function category2()
    {
        $cat = CategoryModel::all();

        return view("category", [
            "cat" => $cat
        ]);
    }

    // public function category(Request $request)
    // {
    //     $idcat = CategoryModel::select('`fID_Cat`()');
    //     $name = $request->input('name');
    //     $totalqty = 0;
    //     $del = 0;

    //     switch ($request->input('action')) {
    //         case 'insert':
    //             $data = array('ID_CATEGORY' => $idcat, "C_NAME" => $name, "TOTAL_PRODUCT" => $totalqty, "STATUS_DELETE" => $del);
    //             DB::table('CATEGORY')->insert($data);
    //             return redirect('category')->with('success', "Insert successfully");
    //             break;
    //     }
    // }

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
