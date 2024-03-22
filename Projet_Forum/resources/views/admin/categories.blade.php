
<x-master_admin>



{{-- @if ($categories->isEmpty())
    <p>Aucune catégorie n'a été trouvée.</p>
@else
    <ul>

    </ul>
@endif --}}


<div class="container w-100" style="">

{{-- <h1>Categories</h1> --}}
{{-- Add catg. --}}
{{-- <div class="container w-50 mx-auto p-4" style="background-color: #adadad97;border-radius:15px;box-shadow: 1px 1px 10px 0px black;margin: 100px 17px 10px 2px"> --}}
    <form class="mt-5 w-75 mx-auto pb-2" style=""  action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @error('nom')
        <div class="text-danger">
             {{$message}}
        </div>
    @enderror
        <div class="row">

            <input type="text" name="nom"  class="form-control w-25 me-2" placeholder="Category name" aria-describedby="helpId" value="{{old('nom')}}">

            <input type="file" name="image"  class="form-control w-50 me-2">            
            <button type="submit" style="background-color:  #891659;color:white;width: 120px" class="btn btn-sm mt-2">Add category</button>

        </div>
    </form>
  {{-- </div> --}}

{{-- <table class="table w-75  mx-auto" style="background-color: #f0f0f080;border-radius:15px;box-shadow: 1px 1px 10px 0px black;margin: 10px 17px 10px 2px"s> --}}
<table class="table   mx-auto">

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
                            <button onclick="return confirm('Voulez vous supprimer cette pub.')"  style="background-color:  #891659;color:white;width: 120px" class=" btn btn-sm "><i class="bi bi-trash-fill"></i> Delete</button>
                        </form>



                {{-- ///editing --}}
                    <button data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}"  style="background-color:  #009688;color:white;width: 120px" class="btn btn-sm mt-1"><i class="bi bi-pencil-square"></i> Edit</button>

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
  <div class="row mx-auto ">  {{$categories->links()}}</div>
</div>
</x-master_admin>
