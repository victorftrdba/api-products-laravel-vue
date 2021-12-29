<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:products',
            'detail' => 'required',
            'price' => 'required',
        ]);

        Product::create($request->all());

        return response()->json([]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return response()->json('Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json('Produto excluído com sucesso!');
    }
}