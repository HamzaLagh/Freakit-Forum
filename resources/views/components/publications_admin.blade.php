
                <div class="card w-25 ms-5 mb-4 bg-light">



                    <div class="card-body p-1 ">
                        {{-- @auth --}}
                        {{-- @if ($canUpdate === true)  --}}
                        {{-- <button class="float-end btn btn-sm  w-25 btn-primary" style="font-size: 12px">
                            <a   href="{{route('publications.edit',$publication->id)}}"></a>
                            Modifier
                        </button> --}}
                            {{-- delete form --}}
                        {{-- @endif --}}
                        {{-- @endauth --}}
                        <blockquote class="blockquote mb-0">
                                <div class="col-12">
                                    <div class="position-relative">
                                        <a href="{{route('profile.show',$publication->user->id)}}"></a>
                                        <h6>{{$publication->user->name}}</h6>


                                    </div>
                                </div>

                            
                            <h6 >{{$publication->titre}}</h6>
                            <p style="font-size: 12px">{{$publication->body}} </p>

                        </blockquote>
                        <form action="{{route('admin.delete_publication',$publication->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Voulez vous supprimer cette pub.')" class="btn btn-sm w-50 float-end" style="background-color: #891659; color: white">Delete</button>
                        </form>
                    </div>
                </div>
    

