@extends ('layouts.master')

@section('content')

    
    @foreach ($posts as $post)
        @include('post.post')
    @endforeach

@endsection