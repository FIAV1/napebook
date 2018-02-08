@extends ('layouts.master')

@section('content')

    @if (session('status'))
    <section id="session-message" class="my-2">
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
    </section>
    @endif

    @include('post.create')

    <section id="posts">
        <div class="container">
            @foreach ($posts as $post)
                @include('post.post', ['state' => 'expand'])
            @endforeach
        </div>
    </section>

    @include('layouts.error')

@endsection