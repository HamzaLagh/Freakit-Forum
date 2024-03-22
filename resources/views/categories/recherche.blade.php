<x-master> 
    <div class="container p-5">
        <h3>Result search :</h3>
        @if(isset($message))
        <p>{{ $message }}</p>
        @else
        @foreach($categories as $category)
        <x-category-card  :category="$category"/>    
    
        @endforeach
        @endif
    </div>



</x-master>