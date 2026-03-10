<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view("frontend.index", compact("products"));
    }
    public function productPageShow(Product $product)
    {
        $components = $product->components()->get();
        $header = Component::where('product_id', $product->id)->where('name', 'header')->first();
        $sections = $header->data['sections'] ?? [];

        $hero = Component::where('product_id', $product->id)->where('name', 'hero')->first();

        $feature = Component::where('product_id', $product->id)->where('name', 'feature')->first();


        $overview = Component::where('product_id', $product->id)->where('name', 'overview')->first();


        return view("frontend.product-page", compact(
            'product',
            'components',
            'header',
            'sections',
            'hero',
            'feature',
            'overview'
        ));
    }

    public function order(Request $request, $product_id)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'quantity' => 'required|integer|min:1',
        ]);
        $order = Order::create([
            'product_id' => $validated['product_id'],
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_phone' => $validated['phone'],
            'shipping_address' => $validated['address'],
            'quantity' => $validated['quantity'],
        ]);

        return redirect()->back()->with('success', 'Order placed successfully');
    }
}
