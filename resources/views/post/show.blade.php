@extends ('layouts.master')

@section('content')

    @include('layouts.message')

    <section id="posts">
        <div class="container">

            <!-- Post -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto mt-5">
                    @include('post.post')
                </div>
            </div>
            <!-- Post End -->
        </div>
    </section>

    @include('post.edit')
    @include('post.delete')

@endsection
