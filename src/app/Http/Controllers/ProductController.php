<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }
    
    public function show($productId){
        $product = Product::findOrFail($productId);
        return view('products.show', compact('product'));
    }

    public function create(){
        return view('products.register');
    }
    public function store(ProductRequest $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seasons' => 'required|array|min:1',
            'seasons.*' => 'string',
            'description' => 'required|string',
        ]);

        $path = $request->file('image')->store('images', 'public');

        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->image = $path;
        $product->description = $validated['description'];
        $product->save();

        if (!empty($validated['seasons'])) {
            $seasonIds = Season::whereIn('name', $validated['seasons'])->pluck('id');
            $product->seasons()->sync($seasonIds);
        }
        return redirect('/products');
    }

    public function search(){
        return view('products.search');
    }
}
