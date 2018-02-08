</div>
</div>
<section id="comments">
    <div class="container">
        @foreach ($post->comments as $comment)
            @include('comment.comment')
        @endforeach
    </div>
</section>
<div class="row">
    <div class="col-12 col-md-7 mx-md-auto">
        <div id="comment-input" class="card text-white mb-2">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-start">
                    @if(auth()->user()->image)
                        <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                    @else
                        <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image mr-3">
                    @endif
                    <div class="d-flex flex-column justify-content-start">
                        <form method="POST" action="/post/{{  $post->id }}/comments">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="comment-text">Comment text-area</label>
                                <textarea name="comment-text" class="form-control {{ $errors->getBag('comment')->has('comment-text') ? ' is-invalid' : '' }}" id="comment-text" rows="2" placeholder="Scrivi un commento" required></textarea>
                                <input type="submit" value="invio">
                            </div>
                        </form>
                    </div>
                </div>