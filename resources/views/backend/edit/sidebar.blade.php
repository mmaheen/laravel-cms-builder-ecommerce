<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="{{ route('edit.page') }}"
        class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-5 fw-semibold">Edit Option</span>
    </a>

    <div class="accordion" id="sidebarAccordion">
        <!-- Navbar Section -->
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingNavbar">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseNavbar" aria-expanded="false" aria-controls="collapseNavbar">
                    Navbar
                </button>
            </h2>
            <div id="collapseNavbar" class="accordion-collapse collapse" aria-labelledby="headingNavbar"
                data-bs-parent="#sidebarAccordion">
                <div class="accordion-body">
                    <form action="{{ route('update.header-title') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="header_title" class="form-label">Header Title</label>
                            <input type="text" id="header_title" class="form-control" name="header_title"
                                value="{{ $header_title }}" placeholder="Header title">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingHero">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseHero" aria-expanded="false" aria-controls="collapseHero">
                    Hero
                </button>
            </h2>
            <div id="collapseHero" class="accordion-collapse collapse" aria-labelledby="headingHero"
                data-bs-parent="#sidebarAccordion">
                <div class="accordion-body">
                    <form action="{{ route('update.hero') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="hero_title" class="form-label">Hero Title</label>
                            <input type="text" id="hero_title" class="form-control" name="hero_title"
                                value="{{ $hero_title }}" placeholder="Hero title">
                        </div>
                        <div class="mb-3">
                            <label for="hero_description" class="form-label">Hero Description</label>
                            <textarea id="hero_description" name="hero_description" class="form-control" rows="8" placeholder="Description">{{ $hero_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hero_image" class="form-label">Hero Image</label>
                            <input type="file" id="hero_image" class="form-control" name="hero_image">
                        </div>
                        <div class="mb-3">
                            <label for="hero_button_title" class="form-label">Button Title</label>
                            <input type="text" id="hero_button_title" class="form-control" name="hero_button_title"
                                value="{{ $hero_button_title }}" placeholder="Button Name">
                        </div>
                        <div class="mb-3">
                            <label for="hero_button_color" class="form-label">Button Color</label>
                            <select class="form-select" name="hero_button_color" id="hero_button_color">
                                <option value="primary" {{ $hero_button_color == 'primary' ? 'selected' : '' }}>Blue
                                </option>
                                <option value="secondary" {{ $hero_button_color == 'secondary' ? 'selected' : '' }}>Gray
                                </option>
                                <option value="success" {{ $hero_button_color == 'success' ? 'selected' : '' }}>Green
                                </option>
                                <option value="danger" {{ $hero_button_color == 'danger' ? 'selected' : '' }}>Red
                                </option>
                                <option value="warning" {{ $hero_button_color == 'warning' ? 'selected' : '' }}>Yellow
                                </option>
                                <option value="info" {{ $hero_button_color == 'info' ? 'selected' : '' }}>Teal
                                </option>
                                <option value="light" {{ $hero_button_color == 'light' ? 'selected' : '' }}>Light
                                    Gray</option>
                                <option value="dark" {{ $hero_button_color == 'dark' ? 'selected' : '' }}>Black
                                </option>
                                <option value="link" {{ $hero_button_color == 'link' ? 'selected' : '' }}>Link Style
                                </option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
