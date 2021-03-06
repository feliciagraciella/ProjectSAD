<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

// class Report extends Authenticatable
class ReportModel extends Model
{
    use HasFactory;

    protected $table = "product_all_all";
    public $primaryKey ="SKU";
    //primary adalah varchar
    public $incrementing = false;

    //timestamp difalse
    public $timestamp = false;

}
