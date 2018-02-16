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
                @foreach ($posts as $post)
                    @include('post.post')
                @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('post.edit')
    @include('post.delete')

@endsection