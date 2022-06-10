<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class LogInModel extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var string[]
//      */
//     protected $fillable = [
//         'admin',
//         'password'
//     ];

//     /**
//      * The attributes that should be hidden for serialization.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];


// }
// class LogInModel extends Model
// {
//     use HasFactory;

//     protected $table = "ADMIN";
//     public $primaryKey = "ID_ADMIN";
//     //Primary key nya adalah varchar
//     public $incrementing = false;

//     //Timestamp di false
//     public $timestamps = false;

//     // public function products() {
//     //     return $this->hasMany(ProductDetailModel::class);
//     // }
// }

class LogInModel extends Model
{
    public function isExist($data1)
    {
        $cmd = "SELECT count(*) is_exist " ."FROM ADMIN " . "WHERE ID_ADMIN=:admin AND PASSWORD_ADMIN=:password;";
        $ad = DB::select($cmd,$data1);

        if($ad[0]->is_exist == 1){
            return true;
        }
        return false;

        if(isset($ad) && count($ad) > 0){
            return $ad;
        }
        return null;
    }

    // public function get_acc($admin_login){
    //     $cmd = "SELECT * from `ADMIN` a WHERE ID_ADMIN=:'admin'";
    //     $data1 = ['admin'=> $admin_login];
    //     $ad = DB::select($cmd,$data1);
    //     return $ad[0];
    // }

}
