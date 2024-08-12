<nav id="sidebar" class="col-md-2  d-flex flex-column p-3">
    <h5 class="text-center">Dashboard Profil</h5>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('profil.home')}}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('profil.edit',Auth::user()->id)}}">
                <i class="fa-solid fa-user"></i> Profil
            </a>
        </li>
    </ul>
</nav>