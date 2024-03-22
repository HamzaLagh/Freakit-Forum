<x-master> 
    <div class="row mx-auto w-75 ">
        <ul class="navbar-nav mx-auto w-50 mt-3 ">
            <li class="nav-item">
              <form class="d-flex" action="/publication.recherche" method="get">
                <input class="form-control" type="text"  name="search" placeholder="Search topics">
                <button class="btn" style="background-color: #9659c3;color:aliceblue;" type="submit">Search</button>
             </form>
            </li> 
          </ul>
            @foreach ($publications as $publication)
                <x-publication  :publication="$publication"/>    
            @endforeach
    
    
         {{$publications->links()}}
    </div>

</x-master>
