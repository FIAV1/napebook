<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto mt-3">
                <div id="post" class="card text-white mb-2">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-start">
                            @if(auth()->user()->image)
                                <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                            @else
                                <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image mr-3">
                            @endif
                            <div class="d-flex flex-column justify-content-start">
                                <span class="post-author"><a href="#">{{ $post->user->name }}  {{ $post->user->surname }}</a></span>
                                <span class="post-time"><small><i class="far fa-clock mr-2"></i>{{ $post->updated_at->diffForHumans(null, true) }}</small></span>
                            </div>

                            @can('edit',$post)
                            <div class="align-self-center ml-auto">
                                <div class="dropdown show">
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item text-right" href="{{ route('post-edit', $post->id) }}">Modifica <i class="fa fa-edit ml-2"></i></a>
                                        <a class="dropdown-item text-right" href="#" id="deletePostButton">Elimina <i class="fas fa-trash ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($post->image_url)
                            <img class="card-img-top mb-4" src="{{ '/storage/'.$post->image_url }}" alt="post image">
                        @endif
                        <p class="card-text text-justify">
                            {{ $post->text }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <span><a class="social-button" href="#"><i class="fas fa-thumbs-up mr-2"></i>Mi piace</a></span>
                            <span><a class="social-button" href="#"><i class="fas fa-comment mr-2"></i>Commenta</a></span>
                            <span><a class="social-button" href="{{ route('post-show', $post->id) }}"><i class="fas fa-expand mr-2"></i>Espandi</a></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto">
                <div class="card mb-5">
                    <div class="container">
                        <div class="row my-3">
                            <div class="col-1"><img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image"></div>
                            <div class="col-10 bg-white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="delete post modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-column">
                    <p>Sicuro di voler eliminare il post?</p>
                    <div class="d-flex flex-row justify-content-end">
                        <form id="deletePostForm" method="POST" action="{{ route('post-destroy', $post->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-primary mr-3">Si</button>
                        </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
