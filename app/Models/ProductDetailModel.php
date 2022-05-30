<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailModel extends Model
{
    use HasFactory;

    protected $table = "PRODUCT";
    public $primaryKey = "SKU";
    //Primary key nya adalah varchar
    public $incrementing = false;

    //Timestamp di false
    public $timestamps = false;

    // public function category() {
    //     return $this->belongsTo(CategoryModel::class);
    // }
}
