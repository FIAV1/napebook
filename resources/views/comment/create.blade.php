<form method="POST" action="{{ route('comment-store',$post->id) }}">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-md-1 ml-3">
            <img src="/storage/{{ $comment->user->image_url }}" alt="user image" class="img-fluid rounded-circle comment-author-image">
        </div>
        <div class="col-md-9">
            <label class="sr-only" for="comment-text">Comment text-area</label>
            <textarea name="comment-text" class="form-control {{ $errors->getBag('comment')->has('comment-text') ? ' is-invalid' : '' }}" id="comment-text" rows="1" placeholder="Scrivi un commento" required></textarea>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary rounded-circle"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</form>
