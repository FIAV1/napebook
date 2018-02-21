<!-- Navbar for small screen -->
<div id="smallNav" class="container-fluid d-block d-lg-none sticky-top bg-dark py-2">
    <div class="row">
        <div class="col-9">
            <form method="GET" action="{{ route('users-search') }}">
                <div class="input-group">
                    <input class="form-control" type="search" name="query" placeholder="Ricerca..." aria-label="Ricerca">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
            <a href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i> <span class="d-none d-md-inline">Logout</span></a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3 text-center">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
        </div>

        <div class="col-3 text-center">
            <div class="dropdown">
                <a id="dropdownMenuFriendshipSmall" class="friendship-notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-users"></i>
                    <span class="badge badge-light friendship-notifications-count">0</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right friendship-notificationsMenu" aria-labelledby="dropdownMenuFriendshipSmall">
                    <li class="dropdown-header">Niente da mostrare</li>
                </ul>
            </div>
        </div>

        <div class="col-3 text-center">
            <div class="dropdown">
                <a id="dropdownMenuGeneralSmall" class="general-notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge badge-light general-notifications-count">0</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right general-notificationsMenu" aria-labelledby="dropdownMenuGeneralSmall">
                    <li class="dropdown-header">Niente da mostrare</li>
                </ul>
            </div>    
        </div>

        <div class="col-3 text-center">
            <a href="{{ route('profile-show', auth()->user()) }}"><img src="/storage/{{ auth()->user()->image_url }}" class="img-fluid rounded-circle img-xs"></a>
        </div>
    </div>
</div>

<!-- Navbar for large screen -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top d-none d-lg-block" id="mainNav">
    <div class="container my-1">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'Napebook') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline ml-md-4 mt-3 mt-md-0" method="GET" action="{{ route('users-search') }}">
                <div class="input-group">
                    <input class="form-control" type="search" name="query" placeholder="Ricerca..." aria-label="Ricerca">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('profile-show', auth()->user()) }}" class="nav-link pr-md-0"><img src="/storage/{{ auth()->user()->image_url }}" class="img-fluid rounded-circle img-xs mr-2">{{ auth()->user()->name }}</a>
                </li>

                <li class="d-none d-md-flex align-items-center"><span class="vertical-divider mx-3"></span></li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link pl-md-0">Home</a>
                </li>

                <li class="dropdown">
                    <a id="dropdownMenuFriendshipLarge" class="nav-link friendship-notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-users"></i>
                        <span class="badge badge-light friendship-notifications-count">0</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right friendship-notificationsMenu" aria-labelledby="dropdownMenuFriendshipLarge">
                        <li class="dropdown-header">Niente da mostrare</li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a id="dropdownMenuGeneralLarge" class="nav-link general-notifications" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-light general-notifications-count">0</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right general-notificationsMenu" aria-labelledby="dropdownMenuGeneralLarge">
                        <li class="dropdown-header">Niente da mostrare</li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>