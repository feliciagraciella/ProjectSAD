<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetailTransModel extends Model
{
    use HasFactory;

    protected $table = "DETAIL_TRANSACTION";
    public $primaryKey = "SKU";
    //Primary key nya adalah varchar
    public $incrementing = false;

    //Timestamp di false
    public $timestamps = false;


}
