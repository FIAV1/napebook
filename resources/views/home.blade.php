@extends ('layouts.master')

@section('content')
    <section id="publish" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <form method="POST" action="/post">
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="sr-only" for="post-text">Post textarea</label>
                                <textarea name="post-text" class="form-control" id="post-text" rows="5" placeholder="Cosa stai pensando?" required></textarea>
                            </div>
                        </div>
                        

                        <div class="form-row">
                            <div class="form-group col-auto">
                                <label class="btn btn-light" for="post-image">Carica un'immagine</label>
                                <input type="file" name="post-image" class="form-control" id="post-image">
                            </div>
                            <div class="col-auto ml-auto">
                                <button type="submit" class="btn btn-primary">Pubblica</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <div class="card text-white bg-light mb-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <img src="{{URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                                <div class="align-self-center"><span class="post-author"><a href="#">John Doe</a></span></div>
                                <div class="align-self-center"><span class="post-time">2 sec</span></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top mb-4" src="{{URL::asset('img/post.jpg') }}" alt="post image">
                            <p class="card-text text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection