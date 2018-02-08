@extends ('layouts.master')

@section('content')
    @include('profile.profile')
    @include('post.create')
    <section id="posts">
        <div class="container">
        @foreach ($posts as $post)
            @include('post.post', ['state' => 'expand'])
        @endforeach
        </div>
    </section>

@endsection