<?php

namespace App\Http\Controllers;

use App\Models\DetailTransModel;
use App\Models\ProductListModel;
use App\Models\ProductDetailModel;
use App\Http\Controllers\SUM;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $category = CategoryModel::select('C_NAME')->get();
        $size = ProductListModel::select('SIZE')->groupBy('SIZE')->get();

        return view('productdetail', [
            'product' => $product[0],
            "cat" => $category,
            'size' => $size
        ]);
    }

    public function dropdowncategory()
    {
        $category = CategoryModel::select('C_NAME')->get();

        return view("productdetail", [
            "cat" => $category
        ]);
    }

    public function insert(Request $request)
    {
        // return $request->file('image')->store('post-images');

        $sku = $request->input('sku');
        $skuimage = $request->input('sku') . '.jpg';
        $name = $request->input('name');
        $cat = $request->input('cat');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $size = $request->input('size');
        $desc = $request->input('desc');


        switch ($request->input('action')) {
            case 'insert':
                if ($request->file('image')) {
                    // $request->file('image')->store('images');

                    $file = $request->file('image');
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('images/best'), $filename);
                }

                $data = array('SKU' => $sku, "P_NAME" => $name, "ID_CATEGORY" => $cat, "PRICE" => $price, "STOCK" => $qty, "SIZE" => $size, "DESCRIPTION" => $desc, "IMAGE" => $skuimage, "STATUS_DELETE" => '0');
                DB::table('PRODUCT')->insert($data);
                return redirect('product')->with('success', "Insert successfully");
                break;

            case 'delete':

                break;
        }
    }

    public function deleteOReditproduct(Request $request)
    {
        $sku = $request->input('sku');
        $name = $request->input('name');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $desc = $request->input('desc');
        $price2 = Str::substr($price, 3);

        switch ($request->input('action')) {
            case 'delete':

                $filename = $request->input('sku').'.jpg';
                $image_path = (public_path('images/best/').$filename);
                if (File::exists($image_path)) {
                    File::delete($image_path);

                    $sku = $request->input('sku');
                    DB::table('PRODUCT')->where([['SKU', '=', $sku]])->delete();
                    return redirect('product')->with('success', "Delete successfully");
                }
                break;

            case 'edit':

                if ($request->file('image')) {
                    if ($request->oldImage) {
                        $filename = $request->oldImage;
                        if (File::exists(public_path('images/best'), $filename)) {
                            File::delete(public_path('images/best'), $filename);
                        }
                    }

                    $file = $request->file('image');
                    $filename = $file->getClientOriginalName();
                    $file->move(public_path('images/best'), $filename);

                    $data = array("P_NAME" => $name, "STOCK" => $qty, "PRICE" => $price2, "DESCRIPTION" => $desc);
                    DB::table('PRODUCT')->where('SKU', $sku)->update($data);
                    return redirect('product')->with('success', "Update successfully");
                }
                break;
        }
    }

    public function sortby(Request $req)
    {
        $sortby = $req->get("sortby");

        if ($sortby == "Price") {
            $product = DB::select("select * from PRODUCT order by PRICE");
        } elseif ($sortby == "Qty") {
            $product = DB::select("select * from PRODUCT order by STOCK");
        } elseif ($sortby == "Size") {
            $product = DB::select("select * from PRODUCT order by SIZE");
        }
        return view("product", [
            "product" => $product
        ]);
    }
}

    // public function addproduct(Request $request)
    // {
    //     $messages = array();
    //     $sku = $_POST['sku'];
    //     $name = $_POST['name'];
    //     $cat = $_POST['cat'];
    //     $price = $_POST['price'];
    //     $qty = $_POST['qty'];
    //     $size = $_POST['size'];
    //     $desc = $_POST['desc'];
    //     $image = $_POST['image'];

    //     //validasi input
    //     if ($sku == '') {
    //         array_push($messages, 'SKU must be filled out.');
    //     }
    //     if ($name == '') {
    //         array_push($messages, 'Name must be filled out.');
    //     }
    //     if ($cat == '') {
    //         array_push($messages, 'Category name must be filled out.');
    //     }
    //     if ($price == '') {
    //         array_push($messages, 'Price must be filled out.');
    //     }
    //     if ($qty == '') {
    //         array_push($messages, 'Qty must be filled out.');
    //     }
    //     if ($size == '') {
    //         array_push($messages, 'Size must be filled out.');
    //     }
    //     if ($desc == '') {
    //         array_push($messages, 'Description must be filled out.');
    //     }
    //     // if($image == ''){
    //     //     array_push($messages, 'Image must be filled out.');
    //     // }
    //     if (isset($messages) && count($messages) > 0) {
    //         return redirect('/product');
    //     }

    //     $data = [
    //         'sku' => $sku,
    //         'name' => $name,
    //         'cat' => $cat,
    //         'price' => $price,
    //         'qty' => $qty,
    //         'size' => $size,
    //         'desc' => $desc
    //     ];

    //     $user = new ProductListModel();
    //     $flag_exist = $user->addproduct($data);

    //     if ($flag_exist == 1) {
    //         return redirect('/product');
    //     }

    //     //menyimpan foto produk
    //     $data = $request->all();
    //     $data['image'] = $request->file('image')->store('images', 'public');
    // }
