<<<<<<< HEAD
<!-- Post -->
<div id="post-{{ $post->id }}" class="py-5">
    <div class="card">

        <div class="card-header">
            <div class="container-fluid">
                <div class="row justify-content-start">

                    <!-- User image, name and post timestamp -->
                    <div class="col-2 col-md-2 col-lg-1 px-0">
                        <img src="/storage/{{ $post->user->image_url }}" alt="user image" class="img-fluid img-thumbnail rounded-circle">
                    </div>
                    
                    <div class="col-auto d-flex flex-column justify-content-center">
                        <a class="post-author" href="{{ route( 'profile-show', $post->user ) }}">{{ $post->user->name }}  {{ $post->user->surname }}</a>
                        <small class="post-time"><i class="far fa-clock mr-2"></i>{{ $post->created_at->diffForHumans(null, true) }}</small>
                    </div>

                    <!-- Post edit -->
                    @can('editPost',$post)
                    <div class="col-auto align-self-center ml-auto">
                        <div class="dropdown show">
                            <a role="button" id="post-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">
                                <a class="dropdown-item text-right post-edit-button" data-id="{{ $post->id }}">Modifica<i class="fa fa-edit ml-2"></i></a>
                                <a class="dropdown-item text-right post-delete-button" data-id="{{ $post->id }}">Elimina<i class="fas fa-trash ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    @endcan

                </div>
            </div>
            <div class="card-body">
                <p class="card-text text-justify">
                    {{ $post->text }}
                </p>
                @if ($post->image_url)
                    <img class="card-img-top mb-4" src="{{ '/storage/'.$post->image_url }}" alt="post image">
                @endif

                <div id="like-amount-{{ $post->id }}">
                    @if ( ($num = $post->getLikesAmount()) == 1)
                        <a class="social-button post-likes" data-postid="{{ $post->id }}" data-toggle="modal" data-target="#likeUsersModal">Piace a {{ $num }} persona</a>
                    @elseif( $num > 1 )
                        <a class="social-button post-likes" data-postid="{{ $post->id }}" data-toggle="modal" data-target="#likeUsersModal">Piace a {{ $num }} persone</a>
                    @endif
                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <span><a class="social-button like {{ auth()->user()->hasLike($post->id) ? 'has-like' : 'hasnt-like'}}" data-postid="{{ $post->id }}"><i class="fas fa-thumbs-up mr-2"></i>Mi piace</a></span>
                    <span><a class="social-button" href="#"><i class="fas fa-comment mr-2"></i>Commenta</a></span>
                    @if ($state == 'expand')
                    <span><a class="social-button" href="{{ route('post-show', $post->id) }}"><i class="fas fa-expand mr-2"></i>Espandi</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Post -->

<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="delete post modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-column">
                    <p>Sicuro di voler eliminare il post?</p>
                    <div class="d-flex flex-row justify-content-end">
                        <form id="deletePostForm" method="POST" action="{{ route('post-destroy', $post) }}">
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
