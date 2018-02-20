<<<<<<< Updated upstream
 <div id="comment-{{ $comment->id }}" class="row my-4">
     <div class="col-1 align-self-center">
         <img src="/storage/{{ $comment->user->image_url }}" alt="user image" class="img-fluid rounded-circle img-xs">
     </div>
     <div class="col-3">
         <div class="d-flex flex-column justify-content-start">
             <span class="comment-author"><a href="{{ route('profile-show', $comment->user) }}">{{ $comment->user->name }}  {{ $comment->user->surname }}</a></span>
             <span class="comment-time"><small><i class="far fa-clock mr-2"></i>{{ $comment->updated_at->diffForHumans(null, true) }}</small></span>
         </div>
     </div>
     <div class="col-7 align-self-center">
         <p class="comment-text m-0">{{ $comment->text }}</p>
     </div>

     <div class="col-auto align-self-center ml-auto">
         <div class="dropdown show">
             <a role="button" id="comment-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">
                 <a class="dropdown-item text-right comment-edit-button" data-id="{{ $comment->id }}">Modifica<i class="fa fa-edit ml-2"></i></a>
                 <a class="dropdown-item text-right comment-delete-button" data-id="{{ $comment->id }}">Elimina<i class="fas fa-trash ml-2"></i></a>
             </div>
         </div>
     </div>
 </div>
=======
<div id="comments-{{ $post->id }}" class="container-fluid rounded text-white mb-2 comments">
    @foreach ($post->comments as $comment)
        <div id="comment-{{ $comment->id }}" class="my-4">
            <div class="row mb-3">
                <div class="col-2 col-md-1">
                    <img src="/storage/{{ $comment->user->image_url }}" alt="user image" class="img-fluid rounded-circle img-xs">
                </div>
                <div class="col-8 col-md-10">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row">
                            <div class="col-auto">
                                <span class="comment-author"><a href="{{ route('profile-show', $comment->user) }}">{{ $comment->user->name }}  {{ $comment->user->surname }}</a></span>
                            </div>
                            <div class="col-auto">
                                <span class="comment-text m-0">{{ $comment->text }}</span>
                            </div>
                        </div>
                        <span class="comment-time"><small><i class="far fa-clock mr-2"></i>{{ $comment->updated_at->diffForHumans(null, true) }}</small></span>
                    </div>
                </div>

                @can('manageComment', $comment)
                <div class="col-auto align-self-center ml-auto">
                    <div class="dropdown show">
                        <a role="button" id="comment-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">
                            <a class="dropdown-item text-right comment-edit-button" data-id="{{ $comment->id }}">Modifica<i class="fa fa-edit ml-2"></i></a>
                            <a class="dropdown-item text-right comment-delete-button" data-id="{{ $comment->id }}">Elimina<i class="fas fa-trash ml-2"></i></a>
                        </div>
                    </div>
                </div>
                @endcan
            </div>

        </div>
    @endforeach
</div>
>>>>>>> Stashed changes
