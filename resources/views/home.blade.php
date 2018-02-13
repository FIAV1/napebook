@extends ('layouts.master')

@section('content')

    @include('layouts.message')

    @include('post.create')

    <section id="posts">
        <div class="container">
            @foreach ($posts as $post)
                @include('post.post', ['state' => 'expand'])
            @endforeach
        </div>
    </section>

    @include('post.edit')
    
@endsection