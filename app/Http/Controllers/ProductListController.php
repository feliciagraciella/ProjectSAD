<?php

namespace App\Http\Controllers;

use App\Models\DetailTransModel;
use App\Models\ProductListModel;
use App\Models\ProductDetailModel;
use App\Http\Controllers\SUM;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ProductListController extends Controller
{
    public function productlist()
    {
        $product = ProductListModel::all();

        return view("product", [
            "product" => $product
        ]);
    }

    public function productdetail($sku)
    {
        $product = ProductDetailModel::select('SKU', 'ID_CATEGORY', 'P_NAME', 'SIZE', 'PRICE', 'STOCK', 'DESCRIPTION', 'IMAGE')->where('SKU', $sku)->get();

        return view('productdetail', [
            'product' => $product[0]
        ]);
    }

    public function addproduct(Request $request)
    {
        $messages = array();
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $cat = $_POST['cat'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $size = $_POST['size'];
        $desc = $_POST['desc'];
        $image = $_POST['image'];

        //validasi input
        if ($sku == '') {
            array_push($messages, 'SKU must be filled out.');
        }
        if ($name == '') {
            array_push($messages, 'Name must be filled out.');
        }
        if ($cat == '') {
            array_push($messages, 'Category name must be filled out.');
        }
        if ($price == '') {
            array_push($messages, 'Price must be filled out.');
        }
        if ($qty == '') {
            array_push($messages, 'Qty must be filled out.');
        }
        if ($size == '') {
            array_push($messages, 'Size must be filled out.');
        }
        if ($desc == '') {
            array_push($messages, 'Description must be filled out.');
        }
        // if($image == ''){
        //     array_push($messages, 'Image must be filled out.');
        // }
        if (isset($messages) && count($messages) > 0) {
            return redirect('/product');
        }

        $data = [
            'sku' => $sku,
            'name' => $name,
            'cat' => $cat,
            'price' => $price,
            'qty' => $qty,
            'size' => $size,
            'desc' => $desc
        ];

        $user = new ProductListModel();
        $flag_exist = $user->addproduct($data);

        if ($flag_exist == 1) {
            return redirect('/product');
        }

        //menyimpan foto produk
        $data = $request->all();
        $data['image'] = $request->file('image')->store('images', 'public');
    }
}
