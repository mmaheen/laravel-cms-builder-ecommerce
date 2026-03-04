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
                                <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                                <li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <section class="hero mt-3">
                <div class="row">
                    <div class="col-lg-8">
                        <img class="w-100" src="{{ asset('storage/uploads/heroes/' . $hero_image) }}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h1>
                                {{ $hero_title }}
                            </h1>
                            <p>{{ $hero_description }}</p>
                            <button
                                class="btn btn-lg btn-{{ $hero_button_color }} my-4">{{ $hero_button_title }}</button>
                        </div>

                    </div>

                </div>
            </section>
            <section class="feature">Feature</section>
            <section class="parts">Parts</section>
            <section class="tutorial">Tutorial</section>
            <section class="gallery">Gallery</section>
            <section class="contact">contact</section>
            <section class="footer">footer</section>
        </div>
    </div>

</body>

</html>
