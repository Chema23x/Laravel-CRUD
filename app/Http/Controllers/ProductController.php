<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::get();
        return view('producto.index',['products' => $products]);
    }
    public function create() : View
    {
        return view('producto.create');
    }
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' =>  'required|numeric'
        ]);

        Product::create([
            'name' => $validated['name'],
            'color' => $validated['color'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('producto.index');
    }
    public function delete($id): Redirect
    {
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('producto.index')->with('success', 'Item eliminado exitosamente'); 
    }
    public function edit(Product $product): View
    {
        return view('producto.edit')->with('product', $product);
    }
       
    public function update(Request $request, Product $product): RedirectResponse
    {

        $validated = $request-> validate([
            'name' => 'required|string',
            'color' => 'required|string',
            'price' =>  'required|numeric'
        ]);

        $product->update($validated);

        return redirect()->route('producto.index');

    }
}
