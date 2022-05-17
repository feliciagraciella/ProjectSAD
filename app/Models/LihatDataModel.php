<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class LihatDataModel extends Model
{
    function get_admin(){
        return DB::table('ADMIN')->get();
    }

    function get_category(){
        return DB::table('CATEGORY')->get();
    }

    function get_detail(){
        return DB::table('DETAIL_TRANSACTION')->get();
    }

    function get_transaction(){
        return DB::table('TRANSACTION')->get();
    }

    function get_product(){
        return DB::table('PRODUCT')->get();
    }
}
