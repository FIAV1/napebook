<div class="container mt-4 mb-5">
    <form>
        <div class="row">
            <div class="col-2 col-md-1 align-self-center">
                <img src="/storage/{{ $post->user->image_url }}" alt="user image" class="img-fluid rounded-circle img-xs">
            </div>
            <div class="col-8 col-md-10">
                <label class="sr-only" for="comment-text">Comment text-area</label>
                <textarea id="comment-text-{{ $post->id }}" name="comment-text" class="form-control {{ $errors->getBag('comment')->has('comment-text') ? ' is-invalid' : '' }}" rows="1" placeholder="Scrivi un commento" required></textarea>
            </div>
            <div class="col-2 col-md-1">
                <button type="button" class="btn btn-primary rounded-circle comment-publish" data-id="{{ $post->id }}"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</div>
