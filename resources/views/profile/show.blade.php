@extends ('layouts.master')

@section('content')

    @include('layouts.message')
    
    <section id="profile-show">
        <div class="container">
        @include('profile.profile')
        </div>
    </section>

    <section id="posts">
        <div class="container">
            <!-- Publish a Post -->
            @can('storePost', $user)
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                @include('post.create')
                </div>
            </div>
            @endcan

            <!-- Post listing -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                @forelse ($posts as $post)
                    @include('post.post')
                @empty
                    <p class="my-5 text-center">Non c'è nulla qui...</p>
                @endforelse

                @isset($posts)
                    <a id="profile-posts-loader" role="button">
                        <p class="social-button my-5 text-center">Carica altri...</p>
                    </a>
                @endisset
                </div>
            </div>
        </div>
    </section>
    
    @can('editProfile', $user)
        @include('profile.edit')
    @endcan
    
    @include('post.edit')
    @include('post.delete')
    
    @include('post.like_modal')

    @include('friendship.manage')

@endsection
