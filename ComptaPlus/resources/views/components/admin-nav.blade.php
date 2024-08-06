<nav id="sidebar" class="col-md-2  d-flex flex-column p-3">
    <h5 class="text-center">Dashboard Admin</h5>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.home')}}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.clients.home')}}">
                <i class="fa-solid fa-users"></i> Clients
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.invoices.home')}}">
                <i class="fa-solid fa-file-invoice"></i> Invoices
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.home')}}">
                <i class="fa-solid fa-user"></i> User
            </a>
        </li>
    </ul>
</nav>