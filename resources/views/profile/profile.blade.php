<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron mt-5 mb-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <h1 class="card-title display-6 text-center mb-5">{{ $user->name }} {{ $user->surname }}</h1>
                                <div class="card bg-light text-white d-none d-md-block card-small mx-auto">
                                    <div class="card-body">
                                        <strong><i class="far fa-envelope mr-2"></i>Email:</strong><p class="card-text">{{ $user->email }}</p>
                                        <p class="card-text"><i class="fas fa-birthday-cake mr-2"></i><strong>Data di nascita:</strong> {{ $user->birthday }}</p>
                                        <p class="card-text"><i class="fas fa-venus-mars mr-2"></i><strong>Sesso:</strong> {{ $user->sex }}</p>
                                        <p class="card-text"><i class="fas fa-user mr-2"></i><strong>Bio:</strong> Una bellissma bio! Ma perchè non la implementiamo anche noi?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                @if($user->image)
                                <img src="{{ $user->image }}" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                                @else
                                <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid img-thumbnail rounded-circle mr-3">
                                @endif
                            </div>
                            <div class="col-12 d-md-none mt-3">
                                <div class="card bg-light text-white">
                                    <div class="card-body">
                                        <p class="card-text"><i class="far fa-envelope mr-2"></i><strong>Email:</strong> {{ $user->email }}</p>
                                        <p class="card-text"><i class="fas fa-birthday-cake mr-2"></i><strong>Data di nascita:</strong> {{ $user->birthday }}</p>
                                        <p class="card-text"><i class="fas fa-venus-mars mr-2"></i><strong>Sesso:</strong> {{ $user->sex }}</p>
                                        <p class="card-text"><i class="fas fa-user mr-2"><strong>Bio</strong></i> Una bellissma bio! Ma perchè non la implementiamo anche noi?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 text-center">
                                <div><i class="fas fa-home"></i> Timeline</div>
                            </div>
                            <div class="col-4 text-center">
                                <div><i class="fas fa-info"></i> Informazioni</div>
                            </div>
                            <div class="col-4 text-center">
                                <div><i class="fas fa-users"></i> Amici</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>