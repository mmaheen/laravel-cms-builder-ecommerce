<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page - {{ $product->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('backend.edit.sidebar')

        <div class="container w-100" id="page-content-wrapper">
            <button class="btn btn-primary  btn-sm my-4" id="menu-toggle"> <i class="fas fa-bars"></i> </button>
            @foreach ($components->sortBy('position') as $component)
                @if ($component->name === 'feature')
                    <x-backend.edit-page.feature :feature="$feature" />
                @elseif ($component->name === 'hero')
                    <x-backend.edit-page.hero :hero="$hero" />
                @elseif($component->name === 'header')
                    <x-backend.edit-page.header :header="$header" :sections="$sections" />
                @elseif ($component->name === 'overview')
                    <x-backend.edit-page.overview :overview="$overview" />
                @endif
            @endforeach

        </div>
    </div>

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>

</body>

</html>
