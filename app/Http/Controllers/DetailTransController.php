<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\DetailTransModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DetailTransController extends Controller
{
    public function total_sales()
    {
        $sales = DetailTransModel::all()
            ->select('SKU', 'sum(QTY_PRODUCT) as total')
            ->groupBy('SKU')
            ->orderBy('total', 'desc');

        return view("home", [
            "totalsales" => $sales
                ->take(4)
        ]);
    }
}
