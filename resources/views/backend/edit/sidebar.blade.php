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
                        @foreach ($navbarFields as $field)
                            <x-form-field :field="$field" />
                        @endforeach
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
                        @foreach ($heroFields as $field)
                            <x-form-field :field="$field" />
                        @endforeach
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
                        @foreach ($featureFields as $field)
                            <x-form-field :field="$field" />
                        @endforeach

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
                        @foreach ($overviewFields as $field)
                            <x-form-field :field="$field" />
                        @endforeach

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
