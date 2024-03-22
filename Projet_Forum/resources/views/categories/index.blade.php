<x-master_admin>



{{-- @if ($categories->isEmpty())
    <p>Aucune catégorie n'a été trouvée.</p>
@else
    <ul>

    </ul>
@endif --}}


<div class="container p-4" style="">

<h1>Categories</h1>
{{-- <table class="table w-75  mx-auto" style="background-color: #f0f0f080;border-radius:15px;box-shadow: 1px 1px 10px 0px black;margin: 10px 17px 10px 2px"s> --}}
<table class="table w-75  mx-auto">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)

      <tr>
                <th scope="row">{{$category->id}}</th>

                <td>{{$category->nom}}</td>

                {{-- <td><img class="card-img-top" src="{{ asset('storage/'.$category->image)}}" width="50" height="60"  alt="Title"></td> --}}
        
                {{-- supression --}}
                <td>                            
                        <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Voulez vous supprimer cette pub.')" class=" btn btn-sm   btn-danger">Supprimer</button>
                        </form>



                {{-- ///editing --}}
                    <button data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}" class="btn btn-success mt-1">Modifier</button>

                     <!-- Modal -->
                     <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true" data-bs-backdrop="false" >
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="editModalLabel{{ $category->id }}">Modifier la catégorie</h5>
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                     <!-- Formulaire editing -->
                                     @include('categories.edit', ['category' => $category])
 
                                 </div>

                             </div>
                         </div>
                     </div>
                </td>
      </tr>

    @endforeach

    


    </tbody>
  </table> 
  <div class="row mx-auto w-25">  {{$categories->links()}}</div>
</div>
</x-master_admin>
