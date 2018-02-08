@extends('layouts.master')


@section('content')
<section id="posts">
    <div class="container">
        @include('post.post', ['state' => 'compress'])
    </div>
</section>
@endsection
