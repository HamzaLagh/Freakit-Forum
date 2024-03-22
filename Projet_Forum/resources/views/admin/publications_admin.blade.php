<x-master_admin>
    <div class="container p-4" >
        <div class="row mx-auto ps-5 my-5">
            @foreach ($publications_admin as $publication) 
                {{-- <x-publication :canUpdate="auth()->user()->id === $publication->user_id" :publication="$publication"/>     --}}
                <x-publications_admin  :publication="$publication"/>    

            @endforeach
    
            <div class="d-flex justify-content-center mt-4">
                {{$publications_admin->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
</x-master_admin>


