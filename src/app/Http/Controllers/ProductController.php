<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products=Product::paginate(6);
        return view('products',compact('products'));
    }

    public function search(Request $request){
        dd($request);
        return view('products-search');
    }

    public function create(){
        return view('products-register');
    }

    public function store(ProductRequest $request){
        $path = $request->file('image')->store('fruits-img','public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $path,
            'description' => $request->description
        ]);

        return redirect('/products');
    }

    public function edit(Request $request){
        $products=$request->all();
        return view('products-detail',compact('products'));
    }

    public function update(ProductRequest $request){
        $product = $request->all();
        Product::find($request->id)->update($product);
        return redirect('/products');
    }

    public function destroy(Request $request){
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
