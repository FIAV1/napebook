<div id="comment-{{ $comment->id }}" class="row my-4">

    <div class="col-2 col-md-1">
        <img src="/storage/{{ $comment->user->image_url }}" alt="user image" class="img-fluid rounded-circle img-xs">
    </div>

    <div class="col-8 col-md-10 rounded bg-dark p-3">
        <div class="d-flex flex-column justify-content-start">
            <div class="d-flex flex-row mb-3">
                <span class="comment-author"><a href="{{ route('profile-show', $comment->user) }}">{{ $comment->user->name }}  {{ $comment->user->surname }}</a></span>
                <span class="comment-time ml-2"><small><i class="far fa-clock mr-2"></i>{{ $comment->updated_at->diffForHumans(null, true) }}</small></span>
            </div>
            <p class="comment-text m-0">{{ $comment->text }}</p>
        </div>
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
