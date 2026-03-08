<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="{{ route('edit.page', $page->id) }}"
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
                    <form action="{{ route('update.header', $page->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="header_position">Position</label>
                            <input type="number" class="form-control" name="header_position"
                                value="{{ $header->position }}">
                        </div>
                        <div class="mb-3">
                            <label for="header_title" class="form-label">Header Title</label>
                            <input type="text" id="header_title" class="form-control" name="header_title"
                                value="{{ $header->data['title'] }}" placeholder="Header title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Show Sections</label>

                            @php
                                $availableSections = [
                                    'home',
                                    'hero',
                                    'feature',
                                    'parts',
                                    'tutorial',
                                    'gallery',
                                    'contact',
                                ];
                            @endphp

                            @foreach ($availableSections as $section)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sections[]"
                                        value="{{ $section }}" id="section{{ ucfirst($section) }}"
                                        {{ in_array($section, $sections ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="section{{ ucfirst($section) }}">
                                        {{ ucfirst($section) }}
                                    </label>
                                </div>
                            @endforeach
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
                    <form action="{{ route('update.hero', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="hero_position">Position</label>
                            <input type="number" class="form-control" name="hero_position"
                                value="{{ $hero->position }}">
                        </div>
                        <div class="mb-3">
                            <label for="hero_title" class="form-label">Hero Title</label>
                            <input type="text" id="hero_title" class="form-control" name="hero_title"
                                value="{{ $hero->data['title'] }}" placeholder="Hero title">
                        </div>
                        <div class="mb-3">
                            <label for="hero_description" class="form-label">Hero Description</label>
                            <textarea id="hero_description" name="hero_description" class="form-control" rows="8" placeholder="Description">{{ $hero->data['description'] }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hero_image" class="form-label">Hero Image</label>
                            <input type="file" id="hero_image" class="form-control" name="hero_image">
                        </div>
                        <div class="mb-3">
                            <label for="hero_button_title" class="form-label">Button Title</label>
                            <input type="text" id="hero_button_title" class="form-control"
                                name="hero_button_title" value="{{ $hero->data['button_title'] }}"
                                placeholder="Button Name">
                        </div>
                        <div class="mb-3">
                            <label for="hero_button_color" class="form-label">Button Color</label>
                            <select class="form-select" name="hero_button_color" id="hero_button_color">
                                <option value="primary"
                                    {{ $hero->data['button_color'] == 'primary' ? 'selected' : '' }}>Blue
                                </option>
                                <option value="secondary"
                                    {{ $hero->data['button_color'] == 'secondary' ? 'selected' : '' }}>
                                    Gray
                                </option>
                                <option value="success"
                                    {{ $hero->data['button_color'] == 'success' ? 'selected' : '' }}>Green
                                </option>
                                <option value="danger"
                                    {{ $hero->data['button_color'] == 'danger' ? 'selected' : '' }}>Red
                                </option>
                                <option value="warning"
                                    {{ $hero->data['button_color'] == 'warning' ? 'selected' : '' }}>Yellow
                                </option>
                                <option value="info" {{ $hero->data['button_color'] == 'info' ? 'selected' : '' }}>
                                    Teal
                                </option>
                                <option value="light" {{ $hero->data['button_color'] == 'light' ? 'selected' : '' }}>
                                    Light
                                    Gray</option>
                                <option value="dark" {{ $hero->data['button_color'] == 'dark' ? 'selected' : '' }}>
                                    Black
                                </option>
                                <option value="link" {{ $hero->data['button_color'] == 'link' ? 'selected' : '' }}>
                                    Link Style
                                </option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="hero_price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="hero_price"
                                value="{{ $hero->data['price'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingFeature">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFeature" aria-expanded="false" aria-controls="collapseFeature">
                    Feature
                </button>
            </h2>
            <div id="collapseFeature" class="accordion-collapse collapse" aria-labelledby="headingFeature"
                data-bs-parent="#sidebarAccordion">
                <div class="accordion-body">
                    <!-- Update Form -->
                    <form action="{{ route('update.feature', $page->id) }}" method="POST">
                        @csrf

                        <!-- Position -->
                        <div class="mb-3">
                            <label for="feature_position" class="form-label">Position</label>
                            <input type="number" class="form-control" name="feature_position"
                                value="{{ $feature->position }}">
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="feature_title" class="form-label">Feature Title</label>
                            <input type="text" id="feature_title" class="form-control" name="feature_title"
                                value="{{ $feature->data['title'] }}" placeholder="Feature title">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="feature_description" class="form-label">Feature Description</label>
                            <textarea id="feature_description" name="feature_description" class="form-control" rows="4"
                                placeholder="Description">{{ $feature->data['description'] }}</textarea>
                        </div>

                        <!-- Add New Feature -->
                        <div class="mb-3 border p-3 rounded">
                            <h6>Add New Feature</h6>
                            <div class="mb-2">
                                <label for="feature_icon" class="form-label">Feature Icon</label>
                                <select id="feature_icon" name="new_feature[icon]" class="form-select">
                                    <option value="fas fa-camera">Camera</option>
                                    <option value="fas fa-battery-full">Battery</option>
                                    <option value="fas fa-check-square">Control</option>
                                    <option value="fas fa-tachometer-alt">Speed</option>
                                    <option value="fas fa-heart">Heart</option>
                                    <option value="fas fa-home">Home</option>
                                    <option value="fas fa-star">Star</option>
                                    <option value="fas fa-envelope">Envelope</option>
                                    <option value="fas fa-user">User</option>
                                    <option value="fas fa-cog">Settings</option>
                                </select>
                            </div>
                            <input type="text" name="new_feature[title]" class="form-control mb-2"
                                placeholder="Title">
                            <textarea name="new_feature[description]" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <!-- Save -->
                        <div class="d-flex justify-content-end mb-3">
                            <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
                        </div>
                    </form>

                    <!-- Existing Features -->
                    <div class="mb-3">
                        <h5 class="mb-3">Feature List</h5>
                        <ul class="list-group">
                            @foreach ($feature->data['features'] as $index => $featureItem)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="{{ $featureItem['icon'] }} me-2"></i>
                                        {{ $featureItem['title'] }}
                                    </span>
                                    <form action="{{ route('feature.destroy', [$index, $page->id]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item mb-3">
            <h2 class="accordion-header" id="headingOverview">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOverview" aria-expanded="false" aria-controls="collapseOverview">
                    Overview
                </button>
            </h2>
            <div id="collapseOverview" class="accordion-collapse collapse" aria-labelledby="headingOverview"
                data-bs-parent="#sidebarAccordion">
                <div class="accordion-body">
                    <form action="{{ route('update.overview', $page->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="overview_position">Position</label>
                            <input type="number" class="form-control" name="overview_position"
                                value="{{ $overview->position }}">
                        </div>
                        <div class="mb-3">
                            <label for="overview_title" class="form-label">overview Title</label>
                            <input type="text" id="overview_title" class="form-control" name="overview_title"
                                value="{{ $overview->data['title'] }}" placeholder="overview title">
                        </div>
                        <div class="mb-3">
                            <label for="overview_description" class="form-label">overview Description</label>
                            <textarea id="overview_description" name="overview_description" class="form-control" rows="8"
                                placeholder="Description">{{ $overview->data['description'] }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="overview_image" class="form-label">overview Image</label>
                            <input type="file" id="overview_image" class="form-control" name="overview_image">
                        </div>
                        <div class="mb-3">
                            <label for="overview_button_title" class="form-label">Button Title</label>
                            <input type="text" id="overview_button_title" class="form-control"
                                name="overview_button_title" value="{{ $overview->data['button_title'] }}"
                                placeholder="Button Name">
                        </div>
                        <div class="mb-3">
                            <label for="overview_button_color" class="form-label">Button Color</label>
                            <select class="form-select" name="overview_button_color" id="overview_button_color">
                                <option value="primary"
                                    {{ $overview->data['button_color'] == 'primary' ? 'selected' : '' }}>Blue
                                </option>
                                <option value="secondary"
                                    {{ $overview->data['button_color'] == 'secondary' ? 'selected' : '' }}>
                                    Gray
                                </option>
                                <option value="success"
                                    {{ $overview->data['button_color'] == 'success' ? 'selected' : '' }}>Green
                                </option>
                                <option value="danger"
                                    {{ $overview->data['button_color'] == 'danger' ? 'selected' : '' }}>Red
                                </option>
                                <option value="warning"
                                    {{ $overview->data['button_color'] == 'warning' ? 'selected' : '' }}>Yellow
                                </option>
                                <option value="info"
                                    {{ $overview->data['button_color'] == 'info' ? 'selected' : '' }}>
                                    Teal
                                </option>
                                <option value="light"
                                    {{ $overview->data['button_color'] == 'light' ? 'selected' : '' }}>
                                    Light
                                    Gray</option>
                                <option value="dark"
                                    {{ $overview->data['button_color'] == 'dark' ? 'selected' : '' }}>
                                    Black
                                </option>
                                <option value="link"
                                    {{ $overview->data['button_color'] == 'link' ? 'selected' : '' }}>
                                    Link Style
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
