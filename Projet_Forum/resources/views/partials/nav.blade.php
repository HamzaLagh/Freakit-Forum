<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-family: 'Aladin', cursive;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{asset('logo-freakit2.png')}}" width="150" alt="" srcset=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">


      

        <ul class="navbar-nav ms-5">
          <li class="nav-item">
            <a class="nav-link" style="border-bottom:2px solid #9659c3" href="{{ route('publications.index') }}">ALL TOPICS </a>
          </li>
        </ul>
        @auth


        <ul class="navbar-nav me-auto mx-4 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" style="border-bottom:2px solid #9659c3" href="{{ route('publications.create') }}"><i class="bi bi-plus"></i>ADD TOPIC</a>
          </li>
        </ul>
      @endauth
          <ul class="navbar-nav mx-auto mt-3 ">
            <li class="nav-item">
              <form class="d-flex" action="/categories.recherche" method="get">
                <input class="form-control" type="text"  name="search" placeholder="Search categories">
                <button class="btn" style="background-color: #9659c3;color:aliceblue;" type="submit">Search</button>
             </form>
            </li> 
          </ul>



        <ul class="navbar-nav me-5 ">
          {{-- <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.index') }}">Tous les profiles</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">Informations</a>
          </li> --}}



          
          {{-- //nass li connecter --}}


          @guest
          <li class="nav-item ">
            <a class="nav-link" style="border-bottom:2px solid " href="{{ route('login') }}">Sign in</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="{{ route('login') }}">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="border-bottom:2px solid #9659c3" href="{{ route('login') }}">Sign up</a>
          </li>
          @endguest
        </ul>
        @auth
        <div class="dropdown mx-5" >
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #9659c3;color: aliceblue">
            {{auth()->user()->name}} 
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('profile.edit', auth()->user()->id) }}">Edit profile</a></li>
            <li><a class="dropdown-item" href="{{route('profile.show', auth()->user()->id )}}">My profile</a></li>
            <li><a class="dropdown-item nav-link text-dark" href="{{ route('login.logout') }}">Logout</a></li>

          </ul>
        </div>
      @endauth

      </div>
    </div>
  </nav>