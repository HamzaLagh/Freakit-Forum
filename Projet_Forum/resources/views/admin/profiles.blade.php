<x-master_admin>
<div class="container p-4" >
        <div class="row mx-auto ps-5 mt-4">
        @foreach ($profiles as $profile)

        <x-profile-card_admin :profile="$profile"/>

        @endforeach

</div>        
{{$profiles->links()}}

</div>
</x-master_admin>