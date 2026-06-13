<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get();

        return view('products.index', compact('products'));
    }


    public function add()
    {
        return view('Products.add');
    }

    public function store(Request $request)
    {
        $products = Product::create($request->all());
        return redirect()->route('product_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('Products.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:100',
            'price' => 'required|decimal:0,2',
            'stock' => 'required|integer',
            'description' => 'nullable',
        ]);
        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('product_index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product_index');
    }
}
