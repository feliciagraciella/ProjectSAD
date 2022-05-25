<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductListModel extends Model
{
    public function addproduct($data)
    {
        $cmd = "INSERT INTO(sku, id_category, p_name, size, price, stock, `description`, `image`)
        VALUES (:sku, 'A', :name, :size, :price, :qty, :desc, '')";
        $res = DB::insert($cmd, $data);
        return $res;
    }
    use HasFactory;

    protected $table = "PRODUCT";
    public $primaryKey = "SKU";
    //Primary key nya adalah varchar
    public $incrementing = false;

    //Timestamp di false
    public $timestamps = false;
}
