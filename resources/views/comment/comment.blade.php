<div class="row">
    <div class="col-12 col-md-7 mx-md-auto">
        <div id="comment" class="card text-white mb-2">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-start">
                    @if(auth()->user()->image)
                        <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle comment-author-image">
                    @else
                        <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle comment-author-image mr-3">
                    @endif
                    <div class="d-flex flex-column justify-content-start">
                        <span class="comment-author"><a href="#">{{ $comment->user->name }}  {{ $comment->user->surname }}</a></span>
                        <span class="comment-time"><small><i class="far fa-clock mr-2"></i>{{ $comment->updated_at->diffForHumans(null, true) }}</small></span>
                    </div>
                    <div class="d-flex flex-column ml-3 text-justify">
                        <p class="card-text text-justify">
                            {{ $comment->text }}
                        </p>
                    </div>

                    @can('edit',$comment)
                        <div class="align-self-center ml-auto">
                            <div class="dropdown show">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                    <!-- a class="dropdown-item text-right" href="{{ route('post-edit', $post->id) }}">Modifica <i class="fa fa-edit ml-2"></i></a-->
                                    <a class="dropdown-item text-right" href="#" id="deletePostButton">Elimina <i class="fas fa-trash ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>