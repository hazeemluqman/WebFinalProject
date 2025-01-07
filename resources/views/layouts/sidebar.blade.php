<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar d-flex flex-column">

    <ul class="sidebar-nav flex-grow-1" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/home">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @can('isAdmin' , App\Models\Grant::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/academicians">
                <i class="bi bi-person"></i>
                <span>Academicians</span>
            </a>
        </li><!-- End Academicians Nav -->
        @endcan

        @canany(['isAdmin', 'isStaff'], App\Models\Grant::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/grants">
                <i class="bi bi-envelope"></i>
                <span>Grants</span>
            </a>
        </li><!-- End Grants Nav -->
        @endcanany

        @canany(['isAdmin', 'isAcademician'], App\Models\Grant::class)
        <li class="nav-item">
            <a class="nav-link collapsed" href="/milestones">
                <i class="bi bi-card-list"></i>
                <span>Milestones</span>
            </a>
        </li><!-- End Milestones Nav -->
        @endcanany

    </ul>

    <!-- Logout Button -->
    <div class="sidebar-footer">
        <a class="btn btn-danger w-100" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</aside><!-- End Sidebar -->