<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function table()
    {
        $pages = Page::all();
        return view('backend.dashboard.table', compact('pages'));
    }

    public function createPage()
    {
        return view('backend.dashboard.form');
    }

    public function storePage(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Create the page using mass assignment
        $page = Page::create([
            'title' => $request->title,
        ]);

        // Create the header component using create()
        Component::create([
            'name' => 'header',
            'position' => 1,
            'page_id' => $page->id,
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
            'page_id' => $page->id,
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
            'page_id' => $page->id,
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
            'page_id' => $page->id,
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
            ->route('table')
            ->with('success', 'Page & all components created successfully.');
    }
}
