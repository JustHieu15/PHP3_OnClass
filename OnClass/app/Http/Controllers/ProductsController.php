<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    function listProduct()
    {
        $list = DB::table('products')
            ->select('products.id', 'products.name', 'products.price', 'products.view', 'products.category_id', 'category.name as category_name' )
            ->join('category', 'products.category_id', '=', 'category.id')
            ->orderBy('products.view', 'desc')
            ->get();
        return view('product/list-product')->with('list', $list);
    }

    function addProduct()
    {
        $category = DB::table('category')
            ->select('id', 'name')
            ->get();
        return view('product/add-product')->with('category', $category);
    }

    function createProduct(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'view' => $request->input('view'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $productInsert = DB::table('products')->insert($data);
        return redirect('products/list-product');
    }

    function editProduct($id)
    {
        $product = DB::table('products')
            ->select('products.id', 'products.name', 'products.price', 'products.category_id', 'products.view', 'category.name as category_name' )
            ->join('category', 'products.category_id', '=', 'category.id')
            ->where('products.id', $id)
            ->first();

        $category = DB::table('category')->select('id', 'name')->get();
        return view('product/edit-product')->with(['product'=> $product, 'category' => $category]);
    }

    function updateProduct(Request $request, $id) {
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'view' => $request->input('view'),
            'updated_at' => Carbon::now()
        ];

        $updateProduct = DB::table('products')->where('id', $id)->update($data);
        return redirect('products/list-product');
    }

    function deleteProduct($id)
    {
        $delete = DB::table('products')->where('id', $id)->delete();
        return redirect('products/list-product');
    }

    function searchProduct(Request $request)
    {
        $search = $request->input('search');
        $list = DB::table('products')
            ->select('products.id', 'products.name', 'products.price', 'products.view', 'products.category_id', 'category.name as category_name' )
            ->join('category', 'products.category_id', '=', 'category.id')
            ->where('products.name', 'like', '%'.$search.'%')
            ->orderBy('products.view', 'desc')
            ->get();
        return view('product/list-product')->with('list', $list);
    }
}
