<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto">
                <div class="card text-white bg-light mb-2">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            @if(auth()->user()->image)
                                <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                            @else
                                <img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image">
                            @endif
                            <div class="align-self-center"><span class="post-author"><a href="#">{{ $post->user->name }}  {{ $post->user->surname }}</a></span></div>
                            <div class="align-self-center"><span class="post-time">{{ $post->updated_at->diffForHumans() }}</span></div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($post->image)
                            <img class="card-img-top mb-4" src="{{ $post->image }}" alt="post image">
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
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-black bg-white border-dark">Cras justo odio</li>
                        <li class="list-group-item text-black bg-white border-dark">Dapibus ac facilisis in</li>
                        <li class="list-group-item text-black bg-white border-dark">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>