<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Cart;
use App\Models\TransactionList;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransactionListController extends Controller
{
    public function translist()
    {
        $trans = TransactionList::query();

        return view("transactionlist", [
            "trans" => $trans
        ]);
    }
}
