<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionListModel extends Model
{
    use HasFactory;

    protected $table = "TRANSACTION";
    public $primaryKey = "ID_TRANSACTION";
    //Primary key nya adalah varchar
    public $incrementing = false;

    //Timestamp di false
    public $timestamps = false;
}
