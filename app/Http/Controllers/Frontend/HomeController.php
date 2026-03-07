<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Component;
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
}
