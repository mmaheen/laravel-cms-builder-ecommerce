<section id="overview" class="mb-5">
    <div class="row" style="min-height: 100vh;">
        <div class="col-lg-7"
            style="background-image: url('/assets/backend/edit-page/images/about_shape.svg'); 
               min-height: 20vh; 
               background-size: contain;
               background-repeat: no-repeat;">
            <img class="w-100" src="{{ asset('assets/backend/edit-page/images/about.png') }}" alt="">
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h2>
                {{ $overview->data['title'] }}
            </h2>
            <p>{{ $overview->data['description'] }}</p>
            <button
                class="btn btn-lg btn-{{ $overview->data['button_color'] }}">{{ $overview->data['button_title'] }}</button>
        </div>
    </div>
</section>
