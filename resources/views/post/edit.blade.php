<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body bg-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-12 mt-3">

                            <div id="post" class="card text-white bg-dark mb-2">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        @if(auth()->user()->image)
                                            <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                                        @else
                                            <img src="{{ URL::asset('/img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                                        @endif
                                        <div class="align-self-center"><span class="post-author"><a href="#">{{ $post->user->name }} {{ $post->user->surname }}</a></span></div>
                                        <div class="align-self-center"><span class="post-time">{{ $post->updated_at->diffForHumans() }}</span></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ($post->image_url)
                                        <img id="postOldImage" class="card-img-top mb-4" src="{{ '/storage/'.$post->image_url }}" alt="post image">
                                    @endif

                                    <form id="updateForm" method="POST" action="{{ route('post-update', $post->id) }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="sr-only" for="post-text">Post text</label>
                                                <textarea class="form-control {{ $errors->getBag('post')->has('post-text') ? ' is-invalid' : '' }}" id="post-text" name="post-text" rows="5">{{ $post->text }}</textarea>
                                                @if ($errors->getBag('post')->has('post-text'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->getBag('post')->first('post-text') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <input id="ImageRemoveInput" type="hidden" name="remove" value="">

                                        <div id="imageForm" class="form-row">
                                            <div class="form-group col-auto">
                                                <label class="btn btn-light" for="postImageEdit">Carica un'immagine<i class="fas fa-image ml-2"></i></label>
                                                <input type="file" id="postImageEdit" name="post-image" class="form-control {{ $errors->getBag('post')->has('post-image') ? ' is-invalid' : '' }}" accept=".jpg, .jpeg, .png">

                                                @if ($errors->getBag('post')->has('post-image'))
                                                <div class="invalid-feedback">
                                                    <strong>{{ $errors->getBag('post')->first('post-image') }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                            @if($post->image_url)
                                            <div class="form-group col-6">
                                                <button type="button" id="imageRemoveButton" class="btn btn-danger">Rimuovi l'immagine</button>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 mt-3">
                            <div class="d-flex justify-content-end">
                                <button id="updateButton" class="btn btn-dark mr-3">Salva <i class="far fa-save ml-2"></i></button>

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annulla <i class="fas fa-times ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
