<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Show all products (optional if only used on dashboard)
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        $product = new Product(); // Prevents null errors in form
        return view('dashboard.products.create', compact('product'));
    }

    // Store new product
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('dashboard')->with('success', 'Product added!');
    }

    // Show edit form
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('dashboard')->with('success', 'Product updated!');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted!');
    }
}
