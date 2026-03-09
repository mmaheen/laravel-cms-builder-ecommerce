<div class="bg-dark border-end" id="sidebar-wrapper" style="min-height:100vh; width:250px;">
    <div class="sidebar-heading text-white p-3">
        <a class="text-decoration-none" href="{{ route('home') }}">
            <h2>Home</h2>
        </a>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="{{ route('table') }}" class="list-group-item list-group-item-action bg-dark text-white">Table</a>
    </div>
</div>
