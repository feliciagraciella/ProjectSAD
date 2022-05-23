<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetailModel;
use App\Models\TransactionListModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TransactionListController extends Controller
{
    public function translist()
    {
        $trans = TransactionListModel::orderBy('DATE_TRANSACTION', 'desc')->get();

        return view("transactionlist", [
            "trans" => $trans
        ]);
    }

    public function details($id)
    {
        $transdet = TransactionDetailModel::find($id);

        return view("transactiondetail", [
            "transdet" => $transdet,
        ]);
    }
}
