<nav class="main-menu">

    <ul>
      <div class="logo mt-3 mb-2">
        <a class="navbar-brand  " href="#"><img src="{{asset('logo_forum_white.png')}}" width="150" alt="" srcset=""></a>
    </div>
      <li class="nav-item ">
        <b></b>
        <b></b>
        <a href="{{ route('admin.dashboard') }}">
          <span class="nav-text"><i class="bi bi-house-fill"></i> Home</span>
        </a>
      </li>

      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('admin.myProfile_admin') }}">
          <span class="nav-text"><i class="bi bi-person-circle"></i> My profile</span>
        </a>
      </li>

      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('admin.categories') }}">
          <span class="nav-text"><i class="bi bi-tags"></i> Categories</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('categories.create') }}">
          <span class="nav-text"><i class="bi bi-plus-square-fill"></i> Add catg.</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('admin.profiles') }}">
          <span class="nav-text"><i class="bi bi-people-fill"></i> Users</span>
        </a>
      </li>
      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('admin.create_user') }}">
          <span class="nav-text"><i class="bi bi-person-add"></i> Add user</span>
        </a>
      </li>
      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('admin.publications_admin') }}">
          <span class="nav-text"><i class="bi bi-card-heading"></i> Topics</span>
        </a>
      </li>
      <li class="nav-item">
        <b></b>
        <b></b>
        <a href="{{ route('login.logout') }}">
          <span class="nav-text"><i class="bi bi-box-arrow-left"></i> Logout</span>
        </a>
      </li>
    </ul>


  </nav>


  {{-- <script>
    $(document).ready(function () {
        var url_current = window.location.href;
        var item = url_current.split('/')[3];
        var slides = document.getElementsByClassName("item-menu");
        for (var i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
        }
        document.getElementById("menu-" + item).classList.add("active");
    });
</script> --}}