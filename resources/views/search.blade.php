@extends ('layouts.master')

@section('content')
    <section id="publish" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <h4>La ricerca ha trovato<i class="fas fa-pencil-alt fa-xs ml-3"></i></h4>
                </div>
            </div>
            @foreach($users as $user)
                <div class="row">
                    <div class="col-12 col-md-7 mx-md-auto mt-3">
                        <div id="friendship" class="card text-white mb-2">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                <!-- <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image"> -->
                                    <div class="col-2"><img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image"></div>
                                    <div class="d-flex flex-column align-self-center">
                                        <span class="friend"><a href="#">{{ $user->name }}  {{ $user->surname }}</a></span>
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