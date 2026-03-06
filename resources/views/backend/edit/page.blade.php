<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex flex-row">
        @include('backend.edit.sidebar')
        {{ $component_order }}
        <div class="container m-3">
            <section class="header">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">{{ $header_title }}</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#feature">Features</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Parts</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Tutorial</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <x-backend.edit-page.hero :image="$hero_image" :title="$hero_title" :description="$hero_description" :buttonColor="$hero_button_color"
                :buttonTitle="$hero_button_title" />
            <x-backend.edit-page.feature />

            <x-backend.edit-page.body-parts />

            <x-backend.edit-page.tutorial />
            <x-backend.edit-page.gallery />
            <x-backend.edit-page.contact />
            <x-backend.edit-page.footer />

            {{-- @php
                $sections = ['feature', 'body-parts', 'tutorial', 'gallery', 'contact', 'footer'];
            @endphp
            @foreach ($sections as $section)
                <x-backend.edit-page.{{ $section }} />
            @endforeach --}}

        </div>
    </div>

</body>

</html>
