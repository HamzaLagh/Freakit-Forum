<x-master_admin>
    <div class="container p-4" >
            {{-- <div class="row mx-auto ps-5 my-5">
                <p>Nombre de catégories : {{ $categoryCount }}</p>
                <p>Nombre de publications : {{ $publicationCount }}</p>
                <p>Nombre d'utilisateurs : {{ $userCount }}</p>
          </div>    --}}
          {{-- <div class="container"> --}}
            <div class="row m-5">
              <div class="col">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">Number of categories</h5>
                      <h1 style="color:#891659"> {{ $categoryCount }}</h1>
                      {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
              </div>
              <div class="col">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">Number of topics</h5>
                      <h1 style="color:#891659">{{ $publicationCount }}</h1>
                      {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
              </div>
              <div class="col mt-3">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">Number of users</h5>
                      <h1 style="color:#891659"> {{ $userCount }}</h1>
                      {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
              </div>
            </div>
          {{-- </div> --}}
    </div>
    </x-master_admin>