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
        $page = Page::where('id', 1)->first();
        // $components = Component::all();
        return $page->components;
        $header_title = $page->header_title;
        $hero_title = $page->hero_title;
        $hero_description = $page->hero_description;
        $hero_image = $page->hero_image;
        $hero_button_title = $page->hero_button_title;
        $hero_button_color = $page->hero_button_color;
        return view("backend.edit.page", compact(
            "header_title",
            "hero_title",
            "hero_description",
            "hero_image",
            "hero_button_title",
            "hero_button_color"
        ));
    }
    public function updateHeaderTitle(Request $request)
    {
        $page = Page::where('id', 1)->first();
        $page->header_title = $request->header_title;
        $page->update();
        return redirect()->route('edit.page');
    }

    public function updateHero(Request $request)
    {
        // return $request;
        $page = Page::where('id', 1)->first();
        $page->hero_title = $request->hero_title;
        $page->hero_description = $request->hero_description;
        $page->hero_button_title = $request->hero_button_title;
        $page->hero_button_color = $request->hero_button_color;

        $image_name = null;
        if ($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $image_name = "Hero" . '_' . uniqid() . "_" . "uploaded_at" . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/heroes/', $image_name, 'public');
            $page->hero_image = $image_name;
        }

        $page->update();
        return redirect()->back();
    }
}
