<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\TransactionListModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransactionListController extends Controller
{
    public function translist()
    {
        $trans = TransactionListModel::all();

        return view("transactionlist", [
            "trans" => $trans
        ]);
    }
}
