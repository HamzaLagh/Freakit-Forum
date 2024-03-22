{{-- @extends('layouts.master') --}}


<x-master>
    <div class="row my-5">
        @foreach ($Profiles as $profile)

        <x-profile-card :profile="$profile"/>

        @endforeach


        {{$Profiles->links()}}
    </div>
</x-master>
