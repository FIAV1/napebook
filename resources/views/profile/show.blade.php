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
                @foreach ($posts as $post)
                    @include('post.post')
                @endforeach
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
