<div class="container mt-4 mb-5">
    <form>
        <div class="row">
            <div class="col-2 align-self-center">
                <img src="/storage/{{ auth()->user()->image_url }}" alt="user image" class="img-fluid rounded-circle img-sm">
            </div>
            <div class="col-8 col-lg-9">
                <label class="sr-only" for="comment-text">Comment text-area</label>
                <textarea id="comment-text-{{ $post->id }}" name="comment-text" class="form-control {{ $errors->getBag('comment')->has('comment-text') ? ' is-invalid' : '' }}" rows="1" placeholder="Scrivi un commento" required></textarea>
            </div>
            <div class="col-auto align-self-center ml-auto p-0">
                <button type="button" class="btn btn-primary rounded-circle comment-publish" data-id="{{ $post->id }}"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</div>
