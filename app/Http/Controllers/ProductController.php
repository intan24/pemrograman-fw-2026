<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        // Ambil data kategori jika form tambah produk membutuhkan pilihan kategori
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }
    
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
    
        return view('master-data.product.index', compact('products'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}