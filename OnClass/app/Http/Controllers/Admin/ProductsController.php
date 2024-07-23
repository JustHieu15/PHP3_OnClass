<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File; //handle file lib

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function addProduct() {
        return view('admin.products.add-product');
    }

    public function createProduct(Request $request) {
//        $product = new Product();
//        $product->name = $request->input('name');
//        $product->price = $request->input('price');
//        $product->description = $request->input('description');
//        $product->save();
//        return redirect('/admin/products');

        $imageURL = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $link = "imagesProduct/";
            $file->move(public_path($link), $filename);

            $imageURL = $link . $filename;
        }
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageURL
        ];

        Product::create($data);
        return redirect('/admin/products');
    }

    public function editProduct($id) {

    }

    public function updateProduct(Request $request, $id) {

    }

    public function deleteProduct($id) {
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        return redirect('/admin/products');
    }
}
