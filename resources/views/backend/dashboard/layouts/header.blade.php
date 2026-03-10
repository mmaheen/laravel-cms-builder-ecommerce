<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-primary" id="menu-toggle"> <i class="fa-solid fa-bars"></i> </button>
        <div class="ms-auto">
            <!-- Logout Button in Navbar -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>
</nav>
