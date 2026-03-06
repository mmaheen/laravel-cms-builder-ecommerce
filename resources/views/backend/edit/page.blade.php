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
        {{-- {{ $components }} --}}
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
                                @foreach ($sections as $section)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#{{ $section }}">
                                            {{ ucfirst($section) }}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </nav>
            </section>

            @foreach ($components->sortBy('position') as $component)
                @if ($component->name === 'feature')
                    <x-backend.edit-page.feature :featureTitle="$feature_title" :featureDescription="$feature_description" />
                @elseif ($component->name === 'hero')
                    <x-backend.edit-page.hero :heroTitle="$hero_title" :heroImage="$hero_image" :heroDescription="$hero_description" :heroButtonColor="$hero_button_color"
                        :heroButtonTitle="$hero_button_title" :heroPrice="$hero_price" />
                @endif
            @endforeach

            {{-- <x-backend.edit-page.feature />

            <x-backend.edit-page.body-parts />

            <x-backend.edit-page.tutorial />
            <x-backend.edit-page.gallery />
            <x-backend.edit-page.contact />
            <x-backend.edit-page.footer /> --}}

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
