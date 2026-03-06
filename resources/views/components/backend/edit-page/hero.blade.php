  <section class="hero mt-3">
      <div class="row">
          <div class="col-lg-8">
              <img class="w-100" src="{{ asset('storage/uploads/heroes/' . $heroImage) }}" alt="">
          </div>
          <div class="col-lg-4">
              <div class="d-flex flex-column justify-content-center h-100">
                  <h1>
                      {{ $heroTitle }}
                  </h1>
                  <p class="text-secondary">{{ $heroDescription }}</p>
                  <p class="text-secondary"><b>Price: </b><span
                          class="badge bg-primary text-white fs-5 px-3 py-2 shadow-sm">{{ $heroPrice }}</span> Taka
                  </p>
                  <button class="btn btn-lg btn-{{ $heroButtonColor }} my-4">{{ $heroButtonTitle }}</button>
              </div>

          </div>

      </div>
  </section>
