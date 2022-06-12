<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartModel
{
    public static function updateCart($dd2, $dd1, $date, $id, $p, $jumlah)
    {
        $data = DB::table('CART')->where([
            ['DATE', '=',$date],
            ['PLATFORM', '=', $dd1],
            ['ID_ADMIN', session('login')]
            ])->get();
        $check = false;
        foreach ($data as $d) {
            if ($d -> SKU == $dd2) {
                $d -> QTY_PRODUCT = $d -> QTY_PRODUCT + $jumlah;
                $check = true;
            }
        }
        if (!$check) {
            $data[] = [
                "produk" => $p,
                "jumlah" => $jumlah
            ];
            DB::table('CART')->insert([
                'ID_TRANSACTION' => $id,
                'ID_ADMIN' => session('login'),
                'DATE' => $date,
                'PLATFORM' => $dd1,
                'SKU' => $dd2,
                'QTY_PRODUCT' => $jumlah,
                'STATUS_DELETE' => '0'
            ]);
        }
        else {
            $data[] = [
                "SKU" => $p,
                "QTY_PRODUCT" => $jumlah
            ];
            DB::table('CART')
            ->where([
                ['SKU', '=', $dd2],
                ['DATE', '=',$date],
                ['PLATFORM', '=', $dd1],
                ['ID_ADMIN', session('login')]
                ])
            ->update(['QTY_PRODUCT' => $d -> QTY_PRODUCT]);

        }
    }
}
