<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 mt-5">
                <h1 class="card-title display-6 text-center mb-5">{{ $user->name }} {{ $user->surname }}</h1>
            </div>
        </div>
        <div class="d-flex row">
            <div class="col-12 col-md-8">
                <div class="card bg-dark text-white d-none d-md-block card-small mx-auto">
                    <div class="card-body">
                        <i class="far fa-envelope mr-2"></i><strong>Email:</strong><p class="card-text mt-3">{{ $user->email }}</p>
                        <i class="fas fa-mobile mr-2"></i><strong>Telefono:</strong><p class="card-text mt-3">
                            @if ($user->phone)
                            {{ $user->phone }}
                            @else
                            Nessun numero di telefono presente.
                            @endif
                        </p>
                        <i class="fas fa-birthday-cake mr-2"></i><strong>Data di nascita:</strong><p class="card-text mt-3">{{ $user->birthday }}</p>
                        <i class="fas fa-venus-mars mr-2"></i><strong>Sesso:</strong><p class="card-text mt-3">
                            @if ( $user->sex == 'M')
                            Maschio
                            @else
                            Femmina
                            @endif
                        </p>
                        <i class="fas fa-user mr-2"></i><strong>Bio:</strong><p class="card-text mt-3">
                            @if ($user->bio)
                            {{ $user->bio }}
                            @else
                            Nessuna bio presente.
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="align-self-center col-12 col-md-4">
                @if($user->image)
                <img src="{{ $user->image }}" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                @else
                <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid img-thumbnail rounded-circle mr-2">
                @endif
            </div>
            <div class="col-12 d-md-none mt-3">
                <div class="card bg-light text-white">
                    <div class="card-body">
                        <i class="far fa-envelope mr-2"></i><strong>Email:</strong><p class="card-text mt-3">{{ $user->email }}</p>
                        <i class="far fa-mobile mr-2"></i><strong>Telefono:</strong><p class="card-text mt-3">{{ $user->phone }}</p>
                        <i class="fas fa-birthday-cake mr-2"></i><strong>Data di nascita:</strong><p class="card-text mt-3">{{ $user->birthday }}</p>
                        <i class="fas fa-venus-mars mr-2"></i><strong>Sesso:</strong><p class="card-text mt-3">{{ $user->sex }}</p>
                        <i class="fas fa-user mr-2"></i><strong>Bio</strong><p class="card-text mt-3">{{ $user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 text-center">
                <a href="{{ route('profile-show', $user) }}" class="btn btn-success btn-nav"><i class="fas fa-home mr-2"></i>Timeline</a>
            </div>
            <div class="col-6 text-center">
                <a href="#" class="btn btn-success btn-nav"><i class="fas fa-users mr-2"></i>Amici</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="mt-5">
            </div>
        </div>
    </div>
</section>