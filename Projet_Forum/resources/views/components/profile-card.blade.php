<div class="col-3  ">
    <div class="card_profiles card " >
        <img class="card-img-top" src="{{ asset('storage/'.$profile->image)}}" width="50"  alt="Title">
        <div class="card">
            <h4 class="card-title">{{$profile->name}}</h4>
            <p class="card-text">{{$profile->email}}</p>
                <a href="{{ route('profile.show', $profile->id) }}" class="stretched-link"></a>
        </div>
        <div class="card-foot border-top p-2 bg-light" style="">
            <form action="{{route('profile.destroy', $profile->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm float-end">Supprimer</button>
            </form>
            <form action="{{route('profile.edit', $profile->id)}}" method="get">
                @csrf
                <button class="btn btn-primary btn-sm float-end me-2">Modifier</button>
            </form>
        </div>
    </div>
</div>
