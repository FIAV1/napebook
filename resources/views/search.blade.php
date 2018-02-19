@extends ('layouts.master')

@section('content')
    <section id="publish" class="my-5">
        <div class="container">
            <div class="row">
                @if($users->isNotEmpty())
                    <div class="col-12 col-md-7 mx-md-auto">
                        <h4>Risultati<i class="fas fa-search fa-xs ml-3"></i></h4>
                    </div>
                @endif
                @if($users->isEmpty())
                    <div class="col-12 col-md-7 mx-md-auto">
                        <h4>Nessun utente trovato...<i class="fas fa-search fa-xs ml-3"></i></h4>
                    </div>
                @endif
            </div>
            @foreach($users as $user)
                <div class="row">
                    <div class="col-12 col-md-7 mx-md-auto mt-3">
                        <div id="friendship" class="card text-white mb-2">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="col-2 col-md-2 col-lg-1 px-0">
                                        <img src="/storage/{{ $user->image_url }}" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                                    </div>
                                    <div class="d-flex flex-column align-self-center">
                                        <span class="friend"><a href="{{ route( 'profile-show', $user ) }}">{{ $user->name }}  {{ $user->surname }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection