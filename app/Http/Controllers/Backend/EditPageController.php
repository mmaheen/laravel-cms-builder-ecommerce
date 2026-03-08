<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Http\Request;

class EditPageController extends Controller
{
    //
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        // return $page;

        $components = $page->components()->orderBy('position')->get();
        // return $components;

        $header = Component::where('page_id', $page->id)->where('name', 'header')->first();
        $sections = $header->data['sections'] ?? [];

        $hero = Component::where('page_id', $page->id)->where('name', 'hero')->first();

        $feature = Component::where('page_id', $page->id)->where('name', 'feature')->first();


        $overview = Component::where('page_id', $page->id)->where('name', 'overview')->first();


        return view("backend.edit.page", compact(
            'page',
            'components',
            'header',
            'sections',
            'hero',
            'feature',
            'overview'
        ));
    }
    public function updateHeader(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $header = Component::where('page_id', $page->id)
            ->where('name', 'header')
            ->firstOrFail();

        $header->position = $request->input('header_position');

        // Get the current data array
        $data = $header->data;

        // Update the header title
        $data['title'] = $request->input('header_title');

        // Update the sections array from checkboxes
        $data['sections'] = $request->input('sections', []);

        // Save back to the component
        $header->data = $data;
        $header->save();

        return back()->with('success', 'Header updated successfully.');
    }

    public function updateHero(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $hero = Component::where('page_id', $page->id)
            ->where('name', 'hero')
            ->firstOrFail();

        // Get the current data array (thanks to $casts in Component model)
        $hero->position = $request->input('hero_position');
        $data = $hero->data;

        // Update values from the request
        $data['title'] = $request->input('hero_title');
        $data['description'] = $request->input('hero_description');
        $data['button_title'] = $request->input('hero_button_title');
        $data['button_color'] = $request->input('hero_button_color');
        $data['price'] = $request->input('hero_price');

        // Handle image upload
        if ($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $image_name = 'Hero_' . uniqid() . '_uploaded_at_' . time() . '.' . $image->getClientOriginalExtension();

            // Store in public/uploads/heroes
            $image->storeAs('uploads/heroes', $image_name, 'public');

            $data['image'] = $image_name;
        }

        // Assign back and save
        $hero->data = $data;
        $hero->save();

        return redirect()
            ->back()
            ->with('success', 'Hero component updated successfully.');
    }

    public function updateFeature(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $feature = Component::where('page_id', $page->id)
            ->where('name', 'feature')
            ->firstOrFail();

        // Update position
        $feature->position = $request->input('feature_position');

        $data = $feature->data;

        // Update title & description
        $data['title'] = $request->input('feature_title');
        $data['description'] = $request->input('feature_description');

        // Add new feature
        if ($request->has('new_feature')) {
            $newFeature = $request->input('new_feature');
            if (!empty($newFeature['title']) && !empty($newFeature['description'])) {
                $data['features'][] = $newFeature;
            }
        }

        $feature->data = $data;
        $feature->save();

        return redirect()->back()->with('success', 'Feature component updated successfully!');
    }

    public function destroyFeature($index, $page)
    {
        $page = Page::findOrFail($page);

        $feature = Component::where('page_id', $page->id)
            ->where('name', 'feature')
            ->firstOrFail();

        $data = $feature->data;

        if (isset($data['features'][$index])) {
            unset($data['features'][$index]);
            $data['features'] = array_values($data['features']); // reindex
            $feature->data = $data;
            $feature->save();
        }

        return redirect()->back()->with('success', 'Feature deleted successfully!');
    }

    public function updateOverview(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $overview = Component::where('page_id', $page->id)
            ->where('name', 'overview')
            ->firstOrFail();

        // Get the current data array (thanks to $casts in Component model)
        $overview->position = $request->input('overview_position');
        $data = $overview->data;

        // Update values from the request
        $data['title'] = $request->input('overview_title');
        $data['description'] = $request->input('overview_description');
        $data['button_title'] = $request->input('overview_button_title');
        $data['button_color'] = $request->input('overview_button_color');
        // $data['price'] = $request->input('overview_price');

        // Handle image upload
        if ($request->hasFile('overview_image')) {
            $image = $request->file('overview_image');
            $image_name = 'overview_' . uniqid() . '_uploaded_at_' . time() . '.' . $image->getClientOriginalExtension();

            // Store in public/uploads/overviewes
            $image->storeAs('uploads/overviews', $image_name, 'public');

            $data['image'] = $image_name;
        }

        // Assign back and save
        $overview->data = $data;
        $overview->save();

        return redirect()
            ->back()
            ->with('success', 'overview component updated successfully.');
    }

    public function test()
    {
        $fields = [

            [
                "type" => "text",
                "name" => "name",
                "label" => "Full Name",
                "placeholder" => "Enter your name",
                "required" => true
            ],

            [
                "type" => "email",
                "name" => "email",
                "label" => "Email",
                "placeholder" => "Enter your email"
            ],

            [
                "type" => "password",
                "name" => "password",
                "label" => "Password"
            ],

            [
                "type" => "textarea",
                "name" => "bio",
                "label" => "Biography",
                "placeholder" => "Write something...",
                "rows" => 5
            ],

            [
                "type" => "number",
                "name" => "age",
                "label" => "Age"
            ],

            [
                "type" => "date",
                "name" => "birthdate",
                "label" => "Birth Date"
            ],

            [
                "type" => "color",
                "name" => "favorite_color",
                "label" => "Favorite Color"
            ],

            [
                "type" => "file",
                "name" => "profile_image",
                "label" => "Upload Image"
            ],

            [
                "type" => "select",
                "name" => "skills",
                "label" => "Select Skills",
                "multiple" => true,
                "options" => [
                    "php" => "PHP",
                    "js" => "JavaScript",
                    "html" => "HTML",
                    "css" => "CSS"
                ]
            ],

            [
                "type" => "radio",
                "name" => "gender",
                "label" => "Gender",
                "options" => [
                    "male" => "Male",
                    "female" => "Female"
                ]
            ],

            [
                "type" => "checkbox",
                "name" => "terms",
                "label" => "Accept Terms"
            ]

        ];

        function render($field)
        {

            echo "<div style='margin-bottom:15px'>";

            if (!empty($field['label'])) {
                echo "<label>{$field['label']}</label><br>";
            }

            switch ($field['type']) {

                case 'text':
                case 'email':
                case 'password':
                case 'number':
                case 'date':
                case 'color':
                    echo "<input 
                    type='{$field['type']}'
                    name='{$field['name']}'
                    placeholder='" . ($field['placeholder'] ?? '') . "'
                    " . (!empty($field['required']) ? 'required' : '') . "
                  >";
                    break;

                case 'textarea':
                    echo "<textarea
                    name='{$field['name']}'
                    rows='" . ($field['rows'] ?? 4) . "'
                    placeholder='" . ($field['placeholder'] ?? '') . "'
                  ></textarea>";
                    break;

                case 'file':
                    echo "<input type='file' name='{$field['name']}'>";
                    break;

                case 'select':

                    $multiple = !empty($field['multiple']) ? "multiple" : "";
                    $name = !empty($field['multiple']) ? $field['name'] . "[]" : $field['name'];

                    echo "<select name='$name' $multiple>";

                    foreach ($field['options'] as $value => $label) {
                        echo "<option value='$value'>$label</option>";
                    }

                    echo "</select>";
                    break;

                case 'radio':

                    foreach ($field['options'] as $value => $label) {
                        echo "
                <label>
                    <input type='radio' name='{$field['name']}' value='$value'>
                    $label
                </label>
                ";
                    }

                    break;

                case 'checkbox':

                    echo "<input type='checkbox' name='{$field['name']}' value='1'>";
                    break;

                case 'hidden':

                    echo "<input type='hidden' name='{$field['name']}' value='" . ($field['value'] ?? '') . "'>";
                    break;
            }

            echo "</div>";
        }

        echo "<form method='POST' enctype='multipart/form-data'>";

        foreach ($fields as $field) {
            render($field);
        }

        echo "<button type='submit'>Submit</button>";
        echo "</form>";
    }
}