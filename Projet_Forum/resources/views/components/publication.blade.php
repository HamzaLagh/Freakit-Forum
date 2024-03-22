

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container mx-auto my-4"> 
                    


                    <div class="card-body w-100 mx-auto"  style="box-shadow: 0px 1px 2px 1px  #9659c3;">

                        <div class="row">
                            @auth
                            @if($publication->user_id == Auth::id())
                            <div class="row  float-end" style="width: 200px">
                                    
                                        <div class="col-2">
                                          <!--  fermer topic -->
                                        @if ($publication->closed)
                                        <form action="{{ route('publications.open', ['publication' => $publication->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn"><i class="bi bi-toggle2-on" style="font-size: 20px;color: red"></i></button>
                                        </form>
                                        @else
                                        <form action="{{ route('publications.close', ['publication' => $publication->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn" ><i class="bi bi-toggle2-off" style="font-size: 20px;color: green"></i></button>
                                        </form>
                                        @endif
                                        </div>
    
    
                                        {{-- @if ($canUpdate === true)  --}}
                                        <div class="col-2"><a class="btn" href="{{route('publications.edit',$publication->id)}}"><i class="bi bi-pencil-square" style="font-size: 20px;color: blue"></i></a></div>
                                        {{-- delete form --}}
                                    <div class="col">
    
                                        <form action="{{route('publications.destroy',$publication->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Do you want to delete this topic?')" class="btn"><i class="bi bi-trash3-fill" style="font-size: 20px;color: red"></i></button>
                                        </form>
                                    {{-- @endif --}}
                                    </div>
    
                            </div>
                            @endif
                            @endauth
                        </div>



                        <div class="row" style="background-color:#9659c3;color: aliceblue">
                            <div class="col-10  " style="font-weight: 700">
                                {{$publication->created_at->addHour()->format('Y-m-d, h:i A')}}
                             </div>
                            <div class="col ms-5" style="font-weight: 700">
                               #{{$publication->id}}
                            </div>

                        </div>




                        {{-- <blockquote class=""> --}}
                            <div class="row bg-light"  >
                                <div class="col-9">                                   
                                {{-- img profil --}}
                                {{-- <div class="col-md-4">
                                    <div class="position-relative">
                                        
                                    </div>
                                </div> --}}
                                <img class="mt-1" src="{{ asset('storage/'.$publication->user->image)}}" style="border-radius: 10px" width="60" alt="" srcset="">

                                   <a  href="{{route('profile.show',$publication->user->id)}}" >{{$publication->user->name}} </a>
                                    <p style="font-size: 12px">{{$publication->user->banner}}</p>
                                </div>

                                <div class="col" style="font-size: 12px">
                                    <p style="margin-bottom: 0"><span style="font-weight: 700">Join date: </span>{{$publication->user->created_at->addHour()->format('M Y')}}</p>
                                    <p><span style="font-weight: 700">Posts: </span>{{ $publication->user->publications->count() }}</p>
                                </div>

                            </div>
                            
                            {{-- <p style="font-size: small">{{$publication->titre}}</p> --}}
                            <p style="font-size: 14px; font-weight: 700;border-bottom:1px solid gray ">{{$publication->body}} </p>

                        {{-- </blockquote> --}}
                        

                        
                        @if (!$publication->closed)
                        <!-- ajouter  commente -->
                        @auth
                            {{-- <h6>Commentaires</h6> --}}
                            @foreach ($publication->comments as $comment)
                                @include('comments.comment', ['comment' => $comment])
                            @endforeach
                            <form action="{{ route('comments.store', ['publication' => $publication->id]) }}" method="post">
                                @csrf
                                {{-- <label for="comment">Ajouter un commentaire :</label> --}}
                                {{-- <textarea name="content" id="comment" cols="30" rows="2"></textarea> --}}
                                {{-- <button type="submit" class="btn btn-primary">Add comment</button> --}}
                                {{-- <div class="form-floating"> --}}
                                    <textarea  name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    {{-- <label for="floatingTextarea">Comments</label> --}}
                                  {{-- </div> --}}
                                  <button type="submit" class="btn btn-primary">Add comment</button>
                            </form>
                        @endauth
                        @else
                            <div class="row text-center">
                            <p style="color: red; padding: 10px">Comments for this post are closed.</p>
                            </div>  
                        @endif
                    </div>


  </div>
    

