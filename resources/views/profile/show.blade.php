@extends ('layouts.master')

@section('content')

    @include('layouts.message')
    
    <section class="mt-5" id="show-profile">
        <div class="container">
        @include('profile.profile')
        </div>
    </section>

    @can('storePost', $user)
        @include('post.create')
    @endcan

    <section id="posts">
        <div class="container">
        @foreach ($posts as $post)
            @include('post.post', ['state' => 'expand'])
        @endforeach
        </div>
    </section>
    
    @can('editProfile', $user)
        @include('profile.edit')
    @endcan

@endsection
