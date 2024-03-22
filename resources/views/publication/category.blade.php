<x-master>
<div class="row mx-auto w-50 ">
  <h2>Topics in the  {{ $category->nom }} category</h2>

    @foreach($publications as $publication)
    <x-publication  :publication="$publication"/> 
  @endforeach
</div>

</x-master>