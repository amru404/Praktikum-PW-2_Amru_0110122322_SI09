<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        return view('user/index');
        }

    public function admin(){
        $produk = Product::all();
        // dd($produk);
        return view('admin/index',compact('produk'));     
    }

    public function about(){
        return view('user/about');     
    }

    
    public function create(){
        return view('admin/addProduk');     
    }

    public function store(request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        Product::create($request->all());
        
        return redirect()->route('admin')->with('success','produk add succsesfully ');     
    }


    public function edit(Product $product)
    {
      return view('admin/editProduk', compact('product'));
    }
 
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect()->route('admin')->with('success', 'Product deleted successfully');
    }
 
    public function update(Request $request, Product $product)
    {
      $request->validate([
           'name'=>'required',
           'price'=>'required',
           'description'=>'required'
      ]);
 
      $product->update($request->all());
      return redirect()->route('admin')->with('success', 'Product updated successfully');
    }

}
