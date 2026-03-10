<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function productIndex()
    {
        $products = Product::all();
        // return $products;
        return view('backend.dashboard.table', compact('products'));
    }

    public function createPage()
    {
        return view('backend.dashboard.form');
    }

    public function storePage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'page_title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . uniqid(),
            'page_title' => $request->page_title,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Create the header component using create()
        Component::create([
            'name' => 'header',
            'position' => 1,
            'product_id' => $product->id,
            'data' => [
                'title' => $request->title,
                'sections' => [
                    'home',
                    'hero',
                    'feature',
                    'parts',
                    'tutorial',
                    'gallery',
                    'contact',
                ],
            ],
        ]);

        Component::create([
            'name' => 'hero',
            'position' => 2,
            'product_id' => $product->id,
            'data' => [
                'image' => 'header_image.png',
                'title' => 'Performance Meets Innovation',
                'description' => 'Engineered for performance, designed for creators.',
                'button_color' => 'primary',
                'button_title' => 'Buy now',
                'price' => 1000,
            ],
        ]);

        Component::create([
            'name' => 'feature',
            'position' => 3,
            'product_id' => $product->id,
            'data' => [
                'title' => 'Powerful Features',
                'description' => 'Discover the cutting-edge technology that powers every detail.',
                'features' => [
                    [
                        'icon' => 'fas fa-camera',
                        'title' => 'Camera',
                        'description' => '20 MP Resolution, 4k at 60 FPS',
                    ],
                    [
                        'icon' => 'fas fa-battery-full',
                        'title' => 'Battery',
                        'description' => 'Up to 90 Minutes Flight Time',
                    ],
                    [
                        'icon' => 'fas fa-check-square',
                        'title' => 'Control',
                        'description' => '2 KM of Smooth Range',
                    ],
                    [
                        'icon' => 'fas fa-tachometer-alt',
                        'title' => 'Speed',
                        'description' => 'Fly up to 30 MPH',
                    ],
                ],
            ],
        ]);

        Component::create([
            'name' => 'overview',
            'position' => 4,
            'product_id' => $product->id,
            'data' => [
                'title' => 'At a Glance',
                'description' => 'Powerful technology built for creators and explorers. Seamless design meets cutting‑edge functionality. Unlock speed, control, and endless possibilities',
                'image' => 'about.png',
                'button_color' => 'primary',
                'button_title' => 'Read more...',
            ],
        ]);

        // Redirect back with success message
        return redirect()
            ->route('edit.page', $product->id)
            ->with('success', 'Page & all components created successfully.');
    }

    public function orders()
    {
        $orders = Order::paginate(10);
        // return $orders;
        return view('backend.dashboard.table', compact('orders'));
    }

    public function updateOrderStatus(Order $order, $status)
    {
        // return $order;
        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated!');
    }
}
