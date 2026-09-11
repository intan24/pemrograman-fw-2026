<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /products/create -> menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // POST /products -> memproses input form produk
 public function store(Request $request)
{
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    $product = Product::create($validated); // ← tambahan: simpan beneran ke DB

    return response()->json([
        'message' => 'Data berhasil disimpan!',
        'data'    => $product
    ]);
}
}