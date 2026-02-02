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
        $query = Product::query();
        $query = $this->getSearchQuery($request, $query);
        $products = $query->paginate(6);
        // dd($products);
        return view('products-search',compact('products'));
    }

    private function getSearchQuery($request, $query){
        $keyword=$request->keyword;
        if(!empty($request->keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    public function create(){
        return view('products-register');
    }

    public function store(ProductRequest $request){
        $product = $request->only(['name','price','image','description']);
        Product::create($product);
        return redirect('/products',compact('product'));
    }

    public function edit(Request $request){
        $products=$request->all();
        return view('products-detail',compact('products'));
    }

    public function update(ProductRequest $request){
        $product = $request->only(['name','price','image','description']);
        Product::find($request->id)->update($product);
        return redirect('/products');
    }

    public function destroy(Request $request){
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
