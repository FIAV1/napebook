<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top" id="mainNav">
    <div class="container my-1">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Napebook') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline ml-md-4 mt-3 mt-md-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Ricerca..." aria-label="Ricerca">
                    <div class="input-group-append">
                    <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('profile-show', auth()->user()) }}" class="nav-link pr-md-0">{{ auth()->user()->name }}</a>
                </li>

                <li class="d-none d-md-flex align-items-center"><span class="vertical-divider mx-3"></span></li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link pl-md-0">Home</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-user-plus"></i></a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-globe"></i></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>