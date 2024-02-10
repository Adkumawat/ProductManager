<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $lenght =10;
        $product = Product::query();

        if($request->get('search')){
            $product->where('name','like','%'.$request->search.'%');
        }
        $products = Product::with('category')->paginate($lenght);

        return view('products.index', compact('products'));
    }

    public function edit(Request $product,$id)
    {

        $product = Product::whereId($id)->with('category')->first();
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
            ]);
            if ($product) {
                return redirect()->route('products.index')->with('success', 'Product created successfully!');
            }

            return redirect()->route('products.store')->with('error', 'Product Not created!');
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required'
        ]);
            $product = Product::whereId($id)->first();
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::whereId($id)->first();
        if($product){
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product Delete successfully!');
        }
    }
}
