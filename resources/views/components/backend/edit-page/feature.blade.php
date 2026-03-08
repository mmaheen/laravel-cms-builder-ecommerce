@props(['feature' => ''])

<section id="feature" class="mb-5">
    <div class="row justify-content-center mb-">
        <div class="col-lg-6 col-md-9">
            <h2 class="text-center">{{ $feature->data['title'] }}</h2>
            <p class="text-center px-5">{{ $feature->data['description'] }}</p>
        </div>

    </div>
    <div class="d-flex flex-wrap justify-content-center text-center">
        @foreach ($feature->data['features'] as $featureItem)
            <div class="single_features m-2" style="flex: 0 0 22%; max-width: 22%;">
                <i class="{{ $featureItem['icon'] }}"></i>
                <h5>{{ $featureItem['title'] }}</h5>
                <p>{{ $featureItem['description'] }}</p>
            </div>
        @endforeach
    </div>
</section>
