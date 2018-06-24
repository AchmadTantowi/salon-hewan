<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Input;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        return view('admin.product.add');
    }

    public function saveProduct(Request $request)
    {
        $file = $request->file('file');
        // dd($file);
        $imagedata = file_get_contents($file);
        $base64 = base64_encode($imagedata);
        // dd($base64);
        $product = Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'image' => $base64
          ]);
        if($product){
            alert()->success('Success','Saved');
            return redirect('/admin/product');
        }
    }
}
