@extends ('layouts.master')

@section('content')
    <section id="publish" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <h4>Crea un post<i class="fas fa-pencil-alt fa-xs ml-3"></i></h4>
                    <form method="POST" action="/post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label class="sr-only" for="post-text">Post textarea</label>
                                <textarea name="post-text" class="form-control" id="post-text" rows="5" placeholder="Cosa stai pensando?" required></textarea>
                            </div>

                            @if ($errors->getBag('post')->has('post-text'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->getBag('post')->first('post-text') }}</strong>
                                </div>
                            @endif
                        </div>
                        

                        <div class="form-row">
                            <div class="form-group col-auto">
                                <label class="btn btn-light" for="post-image">Carica un'immagine<i class="fas fa-image ml-2"></i></label>
                                <input type="file" name="post-image" class="form-control-file" id="post-image" accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="col-auto ml-auto">
                                <button type="submit" class="btn btn-primary">Pubblica<i class="fas fa-paper-plane ml-2"></i></button>
                            </div>

                            @if ($errors->getBag('post')->has('post-image'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->getBag('post')->first('post-image') }}</strong>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @foreach ($posts as $post)
        @include('post.post')
    @endforeach

@endsection