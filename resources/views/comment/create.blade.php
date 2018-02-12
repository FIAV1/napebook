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
            <form method="POST" action="{{ route('comment-store',$post->id).'#comment-input' }}">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="d-flex flex-row">
                        @if(auth()->user()->image)
                            <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                        @else
                            <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image mr-3">
                        @endif
                        <div class="d-flex flex-column mr-3 justify-content-between">
                            <label class="sr-only" for="comment-text">Comment text-area</label>
                            <textarea name="comment-text" class="form-control {{ $errors->getBag('comment')->has('comment-text') ? ' is-invalid' : '' }}" id="comment-text" rows="1" cols="30" placeholder="Scrivi un commento" required></textarea>
                        </div>
                        <div class="d-flex flex-column align-self-center">
                            <button type="submit" class="btn btn-primary">Commenta<i class="fas fa-paper-plane ml-2"></i></button>
                        </div>
                    </div>
                </div>
            </form>