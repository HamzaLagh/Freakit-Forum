<x-master>      <h3>Modifier publication</h3>
            @if ($errors->any())
            <x-alert type="danger">
            <h6>Errors :</h6>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            </x-alert>
        
            @endif
  

  
      <form class="w-50 p-4 mx-auto" action="{{ route('publications.update',$publication->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="mb-3">
              <label for="" class="form-label">Titre</label>
              <input type="text" name="titre"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('titre',$publication->titre)}}">
              @error('titre')
                  <div class="text-danger">
                       {{$message}}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Message :</label>
                <textarea name="body" id="" cols="30" rows="10">{{old('body',$publication->body)}}</textarea>
              </div>

                <select class="form-select" id="categorie_id" name="categorie_id">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
              
              <div class="d grid">
                  <button type="submit" class="btn btn-primary">Ajouter la publication</button>
              </div>
        
      </form>  
  
  </x-master>