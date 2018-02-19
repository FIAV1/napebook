<div id="comment" class="rounded text-white mb-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 align-self-center">
                <img src="/storage/{{ $comment->user->image_url }}" alt="user image" class="img-fluid rounded-circle comment-author-image">
            </div>
            <div class="col-3">
                <div class="d-flex flex-column justify-content-start">
                    <span class="comment-author"><a href="#">{{ $comment->user->name }}  {{ $comment->user->surname }}</a></span>
                    <span class="comment-time"><small><i class="far fa-clock mr-2"></i>{{ $comment->updated_at->diffForHumans(null, true) }}</small></span>
                </div>
            </div>
            <div class="col-8">
                <p><span>{{ $comment->text }}</span></p>
            </div>
        </div>
    </div>
</div>
