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
        $cat2 = ProductListModel::join('CATEGORY', 'CATEGORY.ID_CATEGORY', '=', 'PRODUCT.ID_CATEGORY')
            ->select('CATEGORY.ID_CATEGORY', 'CATEGORY.C_NAME')->where('PRODUCT.SKU', $sku)->get();

        return view('productdetail', [
            'product' => $product[0],
            "cat" => $category,
            'size' => $size,
            'cat2' => $cat2[0]
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
        $name = $request->input('name');
        $cat = $request->input('cat');
        $price = $request->input('price');
        $qty = $request->input('qty');
        $size = $request->input('size');
        $desc = $request->input('desc');
        $cat2 = Str::substr($cat, 0, 1);

        //SKU GENERATE
        $skuu = $cat2 . $size;
        $carisku = DB::table('PRODUCT')->select('SKU')->where('SKU', 'LIKE', '%' . $skuu . '%')
            ->orderBy('SKU', 'DESC')->limit(1)->get();
        $hitung = Str::substr($carisku, 13, 3);
        $lpad = str_pad((int)$hitung + 1, 3, '0', STR_PAD_LEFT);
        $skugen = $skuu . $lpad;
        $skuimage = $skugen . '.jpg';

        switch ($request->input('action')) {
            case 'insert':
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $filename = $file->storeAs('', $skuimage);
                    $file->move(public_path('images/best'), $filename);
                }

                $data = array('SKU' => $skugen, "P_NAME" => $name, "ID_CATEGORY" => $cat2, "PRICE" => $price, "STOCK" => $qty, "SIZE" => $size, "DESCRIPTION" => $desc, "IMAGE" => $skuimage, "STATUS_DELETE" => '0');
                DB::table('PRODUCT')->insert($data);
                return redirect('product')->with('success', "Product '$skugen' added successfully");
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

        $product = ProductListModel::select('P_NAME', 'PRICE', 'STOCK', 'DESCRIPTION')->where('SKU', $sku)->get();

        switch ($request->input('action')) {
            case 'delete':

                $filename = $request->input('sku') . '.jpg';
                $image_path = (public_path('images/best/') . $filename);
                if (File::exists($image_path)) {
                    File::delete($image_path);

                    $sku = $request->input('sku');
                    DB::table('PRODUCT')->where([['SKU', '=', $sku]])->delete();
                    return redirect('product')->with('delete', "Product '$sku' has been deleted");
                }
                break;

            case 'edit':
                if (!($request->file('image')) && $name == $product[0]['P_NAME'] && $price2 == $product[0]['PRICE'] && $qty == $product[0]['STOCK'] && $desc == $product[0]['DESCRIPTION']) {
                    return redirect()->back()->with('message', "Data did not change");
                } elseif ($request->file('image') || $name != $product[0]['P_NAME'] || $price2 != $product[0]['PRICE'] || $qty != $product[0]['STOCK'] || $desc != $product[0]['DESCRIPTION']) {
                    if ($request->file('image')) {
                        if ($request->oldImage) {
                            $old = $request->oldImage;
                            $filename = (public_path('images/best/') . $old);
                            if (File::exists($filename)) {
                                File::delete($filename);
                            }
                        }
                        $skuimage = $request->input('sku') . '.jpg';
                        $file = $request->file('image');
                        $filename = $file->storeAs('', $skuimage);
                        $file->move(public_path('images/best'), $filename);
                    }
                    $data = array("P_NAME" => $name, "STOCK" => $qty, "PRICE" => $price2, "DESCRIPTION" => $desc);
                    DB::table('PRODUCT')->where('SKU', $sku)->update($data);
                    return redirect('product')->with('update', "Update product '$sku' successfully");
                    break;
                }
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
