<section class="header mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ $header->data['title'] }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
