@extends ('layouts.master')

@section('content')

    <section id="session-message" class="my-2">
        @if (session('status'))
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    @include('create')

    <section id="posts">
        <div class="container">
        @foreach ($posts as $post)
            @include('post.post')
        @endforeach

    @include('layouts.error')

@endsection