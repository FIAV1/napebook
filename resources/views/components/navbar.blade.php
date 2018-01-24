@extends('master')

@section('navbar')
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="/home">Napebook</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseContent" aria-controls="collapseContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @auth
    <div class="collapse navbar-collapse" id="collapseContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Ricerca..." aria-label="Ricerca">
        </form>

        <ul>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
        </ul>
    </div>

    @else

    <div class="collapse navbar-collapse" id="collapseContent">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username">
            <input class="form-control mr-sm-2" type="text" placeholder="Password" aria-label="Password">
        </form>
    </div>
    @endauth
</nav>
@endsection