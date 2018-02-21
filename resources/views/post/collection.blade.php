@foreach($posts as $post)
    @include('post.post')

    <div id="comments-{{ $post->id }}" class="container-fluid rounded text-white mb-2 comments">
        @if(!$post->oldestComments->isEmpty())
            @foreach($post->oldestComments as $comment)
                @include('comment.comment')
            @endforeach
            <a class="comments-loader" data-postid="{{ $post->id }}" role="button">
                <p class="social-button my-3 text-center">Carica altri commenti...</p>
            </a>
        @endif
    </div>
    @include('comment.create')
@endforeach