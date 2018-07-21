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
        $this->middleware('auth');
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'file' => 'max:500'
        ]);
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

    public function edit($id){
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'file' => 'max:500'
        ]);
        $file = $request->file('file');
        
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');

        if(!is_null($file)){
            $imagedata = file_get_contents($file);
            $base64 = base64_encode($imagedata);
            $product->image = $base64;
        }
      
        $product->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/product');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        if($product){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/product');
        }
    }
}
