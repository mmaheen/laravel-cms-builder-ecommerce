<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Http\Request;

class EditPageController extends Controller
{
    //
    public function index()
    {
        $page = Page::findOrFail(1);

        $components = $page->components()->orderBy('position')->get();
        // return $components;

        $header = Component::where('page_id', $page->id)->where('name', 'header')->first();
        $header_title = $header->data['header_title'];
        $sections = $header->data['sections'] ?? [];


        $hero = Component::where('page_id', $page->id)->where('name', 'hero')->first();
        $hero_image = $hero->data['hero_image'];
        $hero_title = $hero->data['hero_title'];
        $hero_description = $hero->data['hero_description'];
        $hero_button_color = $hero->data['hero_button_color'];
        $hero_button_title = $hero->data['hero_button_title'];
        $hero_price = $hero->data['hero_price'];

        $feature = Component::where('page_id', $page->id)->where('name', 'feature')->first();
        $feature_title = $feature->data['feature_title'];
        $feature_description = $feature->data['feature_description'];

        return view("backend.edit.page", compact(
            'components',
            'header_title',
            'sections',
            'feature_title',
            'feature_description',
            'hero_image',
            'hero_title',
            'hero_description',
            'hero_button_color',
            'hero_button_title',
            'hero_price'
        ));
    }
    public function updateHeader(Request $request)
    {
        $page = Page::findOrFail(1);

        $header = Component::where('page_id', $page->id)
            ->where('name', 'header')
            ->firstOrFail();

        // Get the current data array
        $data = $header->data;

        // Update the header title
        $data['header_title'] = $request->input('header_title');

        // Update the sections array from checkboxes
        $data['sections'] = $request->input('sections', []);

        // Save back to the component
        $header->data = $data;
        $header->save();

        return redirect()->route('edit.page')
            ->with('success', 'Header updated successfully.');
    }

    public function updateHero(Request $request)
    {
        $page = Page::findOrFail(1);

        $hero = Component::where('page_id', $page->id)
            ->where('name', 'hero')
            ->firstOrFail();

        // Get the current data array (thanks to $casts in Component model)
        $data = $hero->data;

        // Update values from the request
        $data['hero_title'] = $request->input('hero_title');
        $data['hero_description'] = $request->input('hero_description');
        $data['hero_button_title'] = $request->input('hero_button_title');
        $data['hero_button_color'] = $request->input('hero_button_color');

        // Handle image upload
        if ($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $image_name = 'Hero_' . uniqid() . '_uploaded_at_' . time() . '.' . $image->getClientOriginalExtension();

            // Store in public/uploads/heroes
            $image->storeAs('uploads/heroes', $image_name, 'public');

            $data['hero_image'] = $image_name;
        }

        // Assign back and save
        $hero->data = $data;
        $hero->save();

        return redirect()
            ->back()
            ->with('success', 'Hero component updated successfully.');
    }
}
