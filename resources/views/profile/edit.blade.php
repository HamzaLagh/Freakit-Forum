<x-master> <h3>Edit profile  </h3>
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


    <form class="w-50 p-4 mx-auto" action="{{ route('profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name"  class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name',$profile->name) }}">
            @error('name')
                <div class="text-danger">
                     {{$message}}
                </div>
            @enderror
            {{-- <small id="helpId" class="text-muted">Nom complet</small> --}}
          </div>
      
          <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com"  value="{{ old('email',$profile->email)}}">
            @error('email')
            <div class="text-danger">
                 {{$message}}
            </div>
             @enderror
          </div>
      
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Confirmation password</label>
              <input type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Birthdate</label>
              <input type="date" class="form-control" name="date_birthday" value="{{ old('date_birthday',$profile->date_birthday)}}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Banner </label>
              <input type="text" class="form-control" name="banner" value="{{ old('banner',$profile->banner)}}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Image</label>
              <input type="file" class="form-control" name="image">
            </div>
            <div class="d grid">
                <button type="submit" class="btn btn-primary">Modifier</button>

            </div>
      
    </form>
    

</x-master>