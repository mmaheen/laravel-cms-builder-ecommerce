@props(['feature' => ''])

<section id="feature">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-9">
            <h2 class="text-center">{{ $feature->data['title'] }}</h2>
            <p class="text-center px-5">{{ $feature->data['description'] }}</p>
        </div>

    </div>
    <div class="row text-center">

        @foreach ($feature->data['features'] as $feature)
            <div class="col-lg-3">
                <div class="single_features">
                    <i class="{{ $feature['icon'] }}"></i>

                    <h5>{{ $feature['title'] }}</h5>
                    <p>{{ $feature['description'] }}</p>
                </div>
            </div>
        @endforeach

    </div>
</section>
