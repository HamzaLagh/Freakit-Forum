@props(['type'])
<div class="alert mt-2 alert-{{$type}}" role="alert">
    {{$slot}}
</div>
