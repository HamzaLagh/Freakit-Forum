<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<x-master>      
            {{-- @if ($errors->any())
            <x-alert type="danger">
            <h6>Errors :</h6>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </x-alert>
        
            @endif --}}
            <div class="row form-topic w-50 mx-auto mt-5" style="">


                <div class=" col-10 w-50 ">
                    <form class="p-4  " action="{{ route('publications.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 ">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="titre"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('titre')}}">
                            @error('titre')
                                <div class="text-danger">
                                     {{$message}}
                                </div>
                            @enderror
                          </div>
              
              
                            <div class="form-floating ">
                              <textarea name="body" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{old('body')}}</textarea>
                              <label for="floatingTextarea">Message</label>
                            </div>
                            @error('body')
                            <div class="text-danger">
                                 {{$message}}
                            </div>
                            @enderror
              
                            <div class="mb-3 mt-4">
                              <label for="categorie_id" class="form-label">Category :</label>
                              <select class="form-select" id="categorie_id" name="categorie_id">
                                  @foreach($categories as $categorie)
                                      <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                  @endforeach
                              </select>
                          </div>
                            
                            <div class="d grid">
                                <button type="submit" class="btn add mx-auto mt-4">Add topic </button>
                            </div>
                            {{-- <p class="halloween">Happy Halloween!</p> --}}
                    </form>  
                </div>
                <div class="col-10 w-50">
                        <img height="400px" src="{{asset('house.png')}}" alt="">
                </div>
            </div>

  
  </x-master>

  <style>
    .form-topic{
        font-size: 24px;
        /* background-color: black; */
        font-family:'Aladin', cursive;color:#891659;
        /* background-image: url('{{asset('4233872.jpg')}}') */
        /*   overflow: hidden; */
        
        }

/* .btn{
    font-family: 'Aladin', cursive;
  color: #9659c3;
} */


.add{
  font-family: 'Aladin', cursive;
  /* color: #9659c3; */
  font-size: 24px;
  text-align: center;
  /* top: 50%; */
  /* margin-top: 120px; */
  -webkit-perspective: 300px;
  -moz-perspective: 300px;
  -ms-perspective: 300px;
  -o-perspective: 300px;
  perspective: 300px;
}

.add:after{
  content: "Add topic";
  font-family: 'Aladin', cursive;
  color: #9659c3 ;
  position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  /* top: 50%; */
  -webkit-filter: blur(10px);
  -moz-filter: blur(10px);
  -ms-filter: blur(10px);
  -o-filter: blur(10px);
  filter: blur(10px);
  margin-top: 20px;
  z-index: -1;

}
  </style>