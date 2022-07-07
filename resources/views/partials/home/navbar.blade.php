<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ route('home') }}" id="link-brand">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ $active === 'home' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>

                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ $active === $category->slug ? 'active' : '' }}"
                        aria-current="page" href="{{ url('/post/category') }}/{{ $category->slug }}">{{
                        $category->name}}</a>
                </li>
                @endforeach

                <li class="nav-item set-mode">
                    <div class="form-check form-switch m-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                            onchange="setMode();">
                        <label class="form-check-label" id="status-mode" for="flexSwitchCheckDefault">status</label>
                    </div>
                </li>
            </ul>
            <div class="float-right">
                @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Modal search -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('searchPost') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan kata kunci..." name="keyword">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>