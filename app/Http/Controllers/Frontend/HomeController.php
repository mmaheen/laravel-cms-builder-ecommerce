<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Order;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $page = Page::findOrFail(1);

        $components = $page->components()->orderBy('position')->get();
        $header = Component::where('page_id', $page->id)->where('name', 'header')->first();
        $sections = $header->data['sections'] ?? [];

        $hero = Component::where('page_id', $page->id)->where('name', 'hero')->first();

        $feature = Component::where('page_id', $page->id)->where('name', 'feature')->first();


        $overview = Component::where('page_id', $page->id)->where('name', 'overview')->first();


        return view("frontend.index", compact(
            'page',
            'components',
            'header',
            'sections',
            'hero',
            'feature',
            'overview'
        ));
    }

    public function order(Request $request, $page_id)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:pages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'quantity' => 'required|integer|min:1',
        ]);
        $order = Order::create([
            'page_id' => $validated['product_id'],
            'customer_name' => $validated['name'],
            'customer_email' => $validated['email'],
            'customer_phone' => $validated['phone'],
            'shipping_address' => $validated['address'],
            'quantity' => $validated['quantity'],
        ]);
        return $order;
    }
}
