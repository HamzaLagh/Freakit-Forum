{{-- <x-master_admin> 
  <div class="container w-50 mx-auto p-4" style="background-color: #adadad97;border-radius:15px;box-shadow: 1px 1px 10px 0px black;margin: 100px 17px 10px 2px">
    <form class="w-50 p  mx-auto"  action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Category name</label>
            <input type="text" name="nom"  class="form-control" placeholder="" aria-describedby="helpId" value="{{old('nom')}}">
            @error('nom')
                <div class="text-danger">
                     {{$message}}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Category image</label>
            <input type="file" name="image"  class="form-control">
          </div>

    
          <div class="d grid">
            <button type="submit" class="btn btn-primary">Add category</button>
        </div>
    </form>
  </div>
</x-master_admin> --}}



