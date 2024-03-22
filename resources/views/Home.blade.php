<x-master> 
    <div class="container  w-100  mx-auto">
        <div class="row my-5">
            
            @foreach ($categories as $category) 
                <x-category-card  :category="$category"/>    

            @endforeach
    
    
         {{$categories->links()}}
        </div>
    </div>

</x-master>
