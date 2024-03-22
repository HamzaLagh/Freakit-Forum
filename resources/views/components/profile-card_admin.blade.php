

        <div class="card w-25 m-2 p-1" >
            <div class="row">
            <img class="col-4" src="{{ asset('storage/'.$profile->image)}}" width="60" height="80" style="" alt="Title">

                <h6 class="col-6">{{$profile->name}}</h6>
            </div>
            
            {{-- <div class="card"> --}}
                <p class="card-text">{{$profile->email}}</p>
                    <a href="{{ route('profile.show', $profile->id) }}"></a>
            {{-- </div> --}}
            <div class="card-foot border-top p-2 bg-light">
                                            {{-- ///editing --}}

            <button class="btn btn-sm float-start" style="background-color: #009688; color: white;width: 80px" data-bs-toggle="modal" data-bs-target="#editModal{{ $profile->id }}">
                Edit
            </button>
                <!-- Ajoutez l'ID de la modal pour pouvoir la cibler -->
                <form action="{{ route('profile.destroy', $profile->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm w-50 float-end" style="background-color: #891659; color: white">Delete</button>
                </form>
            </div>



            <!-- Ajoutez ce code à la fin de votre vue, avant </body> -->
<div class="modal fade" id="editModal{{ $profile->id}}" tabindex="-1" aria-labelledby="editModalLabel{{ $profile->id}}"aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $profile->id}}">Modifier le profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               @include('admin.edit_profile_user')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <!-- Ajoutez un bouton "Enregistrer" ici si nécessaire -->
            </div>
        </div>
    </div>
</div>



        </div>

