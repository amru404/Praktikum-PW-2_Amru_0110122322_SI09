<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customers;

class TokoController extends Controller
{
    public function index(){
        return view('toko/index');
    }
    public function detail(){
        return view('toko/detail');
    
    }

    public function admin(){
        $products = Product::all();
        return view('toko/admin', compact('products'));
    }


    public function customers(){
        $customers = Customers::all();
        return view('toko/customers', compact("customers"));
    }

    public function create(){
        return view('toko/create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        Product::create($request->all());
        return redirect()->route('produk.admin')->with('success', 'Product created Successfully');
    }

    public function edit(Product $product){
        return view('toko/edit', compact('product'));
    }

    public function destroy(Product $product){
        //        dd($product);
        $product->delete();
        return redirect()->route('produk.admin')->with('success', 'Product deleted Successfully');
    }
    
    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        $product->update($request->all());
        return redirect()->route('produk.admin')->with('success', 'Product updated Successfully');
    }
}
