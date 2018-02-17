@extends ('layouts.master')

@section('content')

    @include('layouts.message')
    
    <section id="profile-show">
        <div class="container">
        @include('profile.profile')
        </div>
    </section>

    <section id="friends-index">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="friends-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="friends-accepted-tab" data-toggle="tab" href="#friends-accepted" role="tab" aria-controls="friends-accepted" aria-selected="true">Amici</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="friends-request-tab" data-toggle="tab" href="#friends-request" role="tab" aria-controls="friends-request" aria-selected="false">Richieste ricevute</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="friends-pendent-tab" data-toggle="tab" href="#friends-pendent" role="tab" aria-controls="friends-pendent" aria-selected="false">Richieste inviate</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="friends-tab-content">
                        <div class="tab-pane fade show active" id="friends-accepted" role="tabpanel" aria-labelledby="friends-accepted-tab">
                            @include('friendship.friends')
                        </div>
                        <div class="tab-pane fade" id="friends-request" role="tabpanel" aria-labelledby="friends-request-tab"></div>
                        <div class="tab-pane fade" id="friends-pendent" role="tabpanel" aria-labelledby="friends-pendent-tab"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('friendship.pendent')
    @include('friendship.request')
    
    @can('editProfile', $user)
        @include('profile.edit')
    @endcan

@endsection