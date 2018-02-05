@extends('layouts.master')

@section('content')
<section id="posts">
    <div class="container">
        @if($post->user->id == auth()->id())
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto mt-3 mb-3">
                <div class="d-flex justify-content-start">
                    <form method="GET" action="{{ route('post-edit', $post->id) }}">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-secondary mr-3">Modifica <i class="fa fa-edit ml-2"></i></button>
                    </form>

                    <form method="POST" action="{{ route('post-destroy', $post->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        
                        <button type="submit" class="btn btn-danger mr-3">Elimina <i class="fas fa-trash ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @include('post.post')

    </div>
</section>
@endsection