<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {

        $product = Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Tovar muvaffaqiyatli qo\'shildi');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        
        $product->update($request->all());

        return redirect()->route('products.index')->with('info', 'Tovar muvaffaqiyatli yangilandi');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('danger', 'Tovar muvaffaqiyatli o\'chirildi');
    }
}
