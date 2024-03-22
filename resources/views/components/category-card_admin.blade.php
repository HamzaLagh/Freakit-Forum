<div class="card m-3 p-0" style="width: 18rem;border:none;border-radius: 10px;font-family: 'Aladin', cursive;">
    <img src="{{asset('storage/'.$category->image)}}" class="card-img-top" alt="...">
    <div class="card-body">
    <h5 class="card-title">{{ $category->nom }}</h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    {{-- <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Voir topics</a> --}}
    <a href="{{ route('category.publications', ['categorie_id' => $category->id]) }}" class="btn" style="background-color: #891659;color:white;">See topics</a>

    </div>
</div>

<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>