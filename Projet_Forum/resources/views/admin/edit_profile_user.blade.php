{{-- Contenu du formulaire d'édition du profil --}}
<form action="{{ route('admin.update_profile_user',$profile->id) }}" method="post">
  @method('PUT')
  @csrf
  <div class="col-6">
  <label for="name">Pseudo :</label>
  <input class="form-control" type="text" name="name" value="{{ $profile->name }}" required>
  </div>

  <div class="col-6">
  <label for="email">Email :</label>
  <input class="form-control" type="email" name="email" value="{{ $profile->email }}" required>
  </div>

  <div class="col-6">
  <label for="role">Role :</label>
  <input class="form-control" type="text" name="role" value="{{ $profile->role }}" required>
  </div>
  <button class="btn btn-primary" type="submit">Save</button>
</form>