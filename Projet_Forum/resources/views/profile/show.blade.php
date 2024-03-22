<x-master> 
    <div class="container-fluid">
        <div class="row w-25 mx-auto">
            <div class="card  py-4">
                <img class="card-img-top w-25 mx-auto" src="{{asset('storage/'.$profile->image)}}" alt="Title"> 
                <div class="card-body text-center ">
                    <h4 class="card-title">#{{$profile->id}} {{$profile->name}}</h4>
                    <p class="card-text">{{$profile->date_birthday}}</p>
                    <p class="card-text">Email: {{$profile->email}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <h3>Publications :</h3> --}}
            <div class="row my-5">
                @foreach ($profile->publications as $publication)
                    <x-publication :canUpdate="auth()->user()->id === $publication->user_id" :publication="$publication"/>    
                @endforeach
        
        
             {{-- {{$publications->links()}} --}}
            </div>
        </div>
    </div>
</x-master>