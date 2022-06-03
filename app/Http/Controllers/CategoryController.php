<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\CategoryModel;
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


        return view("category", [
            "cat" => $cat
        ]);
    }

    public function category2()
    {
        $cat = CategoryModel::all();

        return view("insertproduct", [
            "cat" => $cat
        ]);
    }
}
