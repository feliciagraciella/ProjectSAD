<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LihatDataModel extends Model
{
    function get_cust(){
        return DB::table('CUSTOMER')->get();
    }

    function get_item(){
        return DB::table('ITEM')->get();
    }

    function get_transdet(){
        return DB::table('TRANS_DETAIL')->get();
    }

    function get_transhead(){
        return DB::table('TRANS_HEADER')->get();
    }
}
