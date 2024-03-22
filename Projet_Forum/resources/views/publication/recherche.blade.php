<x-master> 

    <div class="container p-5">
        <h3>Result search :</h3>
        @if(isset($message))
            <p>{{ $message }}</p>
        @else
        @foreach($publications as $publication)
        <x-publication  :publication="$publication"/>  
  

        @endforeach
        @endif
    </div>


</x-master>