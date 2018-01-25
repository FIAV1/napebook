<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Napebook') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @auth

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Ricerca..." aria-label="Ricerca">
        </form>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
            </li>
        </ul>

    @else

        <form class="form-inline ml-auto my-2 my-lg-0">

            {{ csrf_field() }}

            <input class="form-control mr-sm-2" type="mail" placeholder="Username" aria-label="Username" required>

            <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password" required>

            <div class="form-check my-1 mr-2">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Ricordami
                </label>
            </div>

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
    @endauth
    </div>
</nav>