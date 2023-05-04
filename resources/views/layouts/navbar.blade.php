<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/home">Mascotas en adopcion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/categories">Categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pets">Mascotas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/orders">Ordenes</a>
        </li>         
      </ul>
      

      <li class="navbar-nav nav-item dropdown inline">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end px-1" aria-labelledby="bd-theme">
              <li>
                  <a class="dropdown-item" href="{{ route('profile.edit') }}">
                      {{ ('Profile') }}
                  </a>
              </li>
              <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      {{ ('Log out') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
          </ul>
      </li
      
   </div>
  </div>
</nav>