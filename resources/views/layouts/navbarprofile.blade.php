<li class="navbar-nav nav-item dropdown inline ">
    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{Auth::user()->name }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end bg-secondary px-1 " aria-labelledby="bd-theme">
        <li>
            <a class="dropdown-item bg-secondary text-white" href="{{ route('profile.edit') }}">
                {{ ('Home') }}
            </a>
        </li>
        <li>
            <a class="dropdown-item bg-secondary text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ ('Log out') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</li
      
