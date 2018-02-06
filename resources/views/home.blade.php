@extends ('layouts.master')

@section('content')
     @include('create')

    <section id="posts">
        <div class="container">
        @foreach ($posts as $post)
            @include('post.post')
        @endforeach
        </div>
    </section>

    @include('layouts.error')

@endsection