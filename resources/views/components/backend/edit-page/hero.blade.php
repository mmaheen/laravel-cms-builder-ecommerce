  <section class="hero mt-3">
      <div class="row">
          <div class="col-lg-8">
              <img class="w-100" src="{{ asset('storage/uploads/heroes/' . $image) }}" alt="">
          </div>
          <div class="col-lg-4">
              <div class="d-flex flex-column justify-content-center h-100">
                  <h1>
                      {{ $title }}
                  </h1>
                  <p class="text-secondary">{{ $description }}</p>
                  <p class="text-secondary"><b>Price: </b><span
                          class="badge bg-primary text-white fs-5 px-3 py-2 shadow-sm">180</span> Taka
                  </p>
                  <button class="btn btn-lg btn-{{ $buttonColor }} my-4">{{ $buttonTitle }}</button>
              </div>

          </div>

      </div>
  </section>
