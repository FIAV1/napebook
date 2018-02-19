<div class="row">

    <!-- Card User Info -->
    <div id="profile-info" class="col-12 col-md-8 order-2 order-md-1">
        <div class="card text-white mx-auto mt-5">

            <div class="card-header d-flex" id="info-heading">
                <h4 class="card-title mb-0 align-self-center" data-toggle="collapse" data-target="#info" aria-expanded="true" aria-controls="info">
                    <span id="name">{{ $user->name }}</span>
                    <span id="surname">{{ $user->surname }}</span>
                </h4>
                @can('editProfile', $user)
                <a id="profile-edit-button" class="btn btn-secondary ml-auto rounded-circle" data-id="{{ $user->id }}"><i class="fas fa-pencil-alt"></i></a>
                @endcan
                @cannot('manageFriendship', $user)
                    @if (!auth()->user()->isFriendOf($user->id) and !auth()->user()->friendshipSent($user->id) and !auth()->user()->friendshipReceived($user->id))
                        <!-- non è mio amico e no richieste-->
                        <button type="button" class="btn btn-info ml-auto friendship-add-button" data-id="{{ $user->id }}">Aggiungi agli amici</button>
                    @else
                        <!-- non è mio amico ma richieste / è mio amico -->
                        <div class="dropdown ml-auto">
                            <button class="btn btn-info dropdown-toggle" type="button" id="friendship-management" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- ho inviato richiesta -->
                                    {{ auth()->user()->friendshipSent($user->id) ? 'Richiesta di amicizia inviata' : '' }}

                                    <!-- ho ricevuto richiesta -->
                                    {{ auth()->user()->friendshipReceived($user->id) ? 'Vuole essere tuo amico' : '' }}

                                    <!-- siamo amici -->
                                    {{ auth()->user()->isFriendOf($user->id) ? 'Amici' : '' }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="friendship-management">

                                @if (auth()->user()->friendshipSent($user->id))
                                    <!-- Ho inviato richiesta - chiama cancel in friendshipManage.js -->
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="{{ $user->id }}">Annulla richiesta di amicizia</a>
                                @endif

                                @if (auth()->user()->friendshipReceived($user->id))
                                    <!-- Ho ricevuto richiesta - chiama accept, deny in friendshipManage.js -->
                                    <a href="#" class="dropdown-item friendship-accept-button" data-id="{{ $user->id }}">Accetta richiesta di amicizia</a>
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="{{ $user->id }}">Rifiuta richiesta di amicizia</a>
                                @endif

                                @if (auth()->user()->isFriendOf($user->id))
                                    <!-- Sono amico - chiama cancel in friendshipManage.js -->
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="{{ $user->id }}">Rimuovi dagli amici</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endcannot
            </div>

            <div id="info" class="collapse show" aria-labelledby="info-heading" data-parent="#profile-info">
                <div class="card-body">
                    <i class="far fa-envelope mr-2"></i><strong>Email:</strong><p id="email" class="card-text mt-3">{{ $user->email }}</p>
                    <i class="fas fa-mobile mr-2"></i><strong>Telefono:</strong><p id="phone" class="card-text mt-3">
                        @if ($user->phone)
                        {{ $user->phone }}
                        @else
                        Nessun numero di telefono presente.
                        @endif
                    </p>
                    <i class="fas fa-birthday-cake mr-2"></i><strong>Data di nascita:</strong><p id="birthday" class="card-text mt-3">{{ $user->birthday }}</p>
                    <i class="fas fa-venus-mars mr-2"></i><strong>Sesso:</strong><p id="sex" class="card-text mt-3">
                        @if ($user->sex)
                        Uomo
                        @else
                        Donna
                        @endif
                    </p>
                    <i class="fas fa-user mr-2"></i><strong>Bio:</strong><p id="bio" class="card-text mt-3">
                        @if ($user->bio)
                        {{ $user->bio }}
                        @else
                        Nessuna bio presente.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Card End -->

    <!-- Image User -->
    <div class="align-self-center col-12 col-md-4 order-1 order-md-2 mt-5">
        <img id="profile-image" src="/storage/{{ $user->image_url }}" alt="user image" class="img-fluid img-thumbnail rounded-circle">

        @can('editProfile', $user)
        <form id="profile-image-edit" method="POST" action="{{ route('profile-image-update', $user->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <label class="btn btn-secondary rounded-circle" for="profile-image-update"><i class="fas fa-pencil-alt"></i></label>
            <input type="file" name="user-image" id="profile-image-update" data-id="{{ $user->id }}" class="form-control" accept=".jpg, .jpeg, .png">
        </form>
        @endcan

        @if ($errors->getBag('profileImage')->has('user-image'))
            <strong class="text-danger">{{ $errors->getBag('profileImage')->first('user-image') }}</strong>
        @endif
    </div>
    <!-- Image User End -->
</div>

<a name="content"></a>

<!-- Nav Buttons -->
<div class="row mt-5">
    <div class="col-6 text-center">
        <a href="{{ route('profile-show', $user) }}#content" class="btn btn-success btn-nav"><i class="fas fa-home mr-2"></i>Timeline</a>
    </div>
    <div class="col-6 text-center">
        <a href="{{ route('friends-index', $user) }}#content" class="btn btn-success btn-nav"><i class="fas fa-users mr-2"></i>Amici</a>
    </div>
</div>
<!-- Nav Buttons End -->

<div class="row">
    <div class="col-12">
        <hr class="mt-5">
    </div>
</div>
