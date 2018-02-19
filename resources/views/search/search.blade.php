@extends ('layouts.master')

@section('content')
    <section id="user-search" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <h3 class="text-center">Risultati<i class="fas fa-search fa-xs ml-3"></i></h3>
                </div>
            </div>
            @forelse($users as $user)
                <div class="row">
                    <div class="col-12 col-md-7 mx-md-auto mt-3">
                        <div class="d-flex flex-row">
                            <img src="/storage/{{ $user->image_url }}" alt="user image" class="img-fluid img-thumbnail rounded-circle img-md">
                            <a class="align-self-center ml-3" href="{{ route( 'profile-show', $user ) }}">{{ $user->name }}  {{ $user->surname }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-12 col-md-7 mx-md-auto mt-3">
                        <p>Nessun utente trovato!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection