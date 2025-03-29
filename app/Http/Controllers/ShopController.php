<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show all products on homepage
    public function index()
    {
        $products = Product::latest()->paginate(12);
        $categories = Category::all();

        return view('shop.index', compact('products', 'categories'));
    }

    // Show products by category
    public function category(Category $category)
    {
        $products = $category->products()->paginate(12);
        $categories = Category::all();

        return view('shop.index', compact('products', 'categories'));
    }

    // Show product details
    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }

    // Cart page
    public function cart()
    {
        return view('shop.cart');
    }

    // Process Order
    public function order(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        \App\Models\Order::create($request->all());

        return redirect()->route('shop.index')->with('success', 'Order placed successfully!');
    }
}
