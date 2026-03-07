  <section class="hero mt-3">
      <div class="row">
          <div class="col-lg-8">
              <img class="w-100" src="{{ asset('storage/uploads/heroes/' . $hero->data['image']) }}" alt="">
          </div>
          <div class="col-lg-4">
              <div class="d-flex flex-column justify-content-center h-100">
                  <h1>
                      {{ $hero->data['title'] }}
                  </h1>
                  <p class="text-secondary">{{ $hero->data['description'] }}</p>
                  <p class="text-secondary"><b>Price: </b><span
                          class="badge bg-primary text-white fs-5 px-3 py-2 shadow-sm">{{ $hero->data['price'] }}</span>
                      Taka
                  </p>
                  <button
                      class="btn btn-lg btn-{{ $hero->data['button_color'] }} my-4">{{ $hero->data['button_title'] }}</button>
              </div>

          </div>

      </div>
  </section>
