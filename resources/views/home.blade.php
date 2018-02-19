@extends ('layouts.master')

@section('content')

    @include('layouts.message')

    <section id="posts">
        <div class="container">

            <!-- Publish a Post -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                @include('post.create')
                </div>
            </div>

            <!-- Post listing -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    @forelse($posts as $post)
                        @include('post.post')
                        @include('comment.comment')
                        @include('comment.create')
                    @empty
                        <p class="my-5 text-center">Non c'è nulla qui...</p>
                    @endforelse

                    @if(!$posts->isEmpty())
                        <a id="home-posts-loader" role="button">
                            <p class="social-button my-5 text-center">Carica altri...</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('post.edit')
    @include('post.delete')
    @include('post.like_modal')
    @include('comment.edit')
    @include('comment.delete')

@endsection