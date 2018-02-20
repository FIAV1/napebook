@extends ('layouts.master')

@section('content')

    @include('layouts.message')

    <section id="posts">
        <div class="container">

            <!-- Post -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto mt-5">
                    @include('post.post')

                    <div id="comments-{{ $post->id }}" class="container-fluid rounded text-white mb-2 comments">
                        @if(!$post->oldestComments->isEmpty())
                            @foreach($post->oldestComments as $comment)
                                @include('comment.comment')
                            @endforeach
                            <a class="comments-loader" data-postid="{{ $post->id }}" role="button">
                                <p class="social-button my-5 text-center">Carica altri...</p>
                            </a>
                        @endif
                    </div>
                    @include('comment.create')
                </div>
            </div>
            <!-- Post End -->
        </div>
    </section>

    @can('editPost', $post)
        @include('post.edit')
    @endcan

    @can('destroyPost', $post)
        @include('post.delete')
    @endcan

    @include('post.like_modal')
    @include('comment.edit')
    @include('comment.delete')

@endsection
