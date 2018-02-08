@extends ('layouts.master')

@section('content')

    @if (session('status'))
<<<<<<< fb39c731bb38dc87b8d6c98d1578c22ea3991ecd
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
=======
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
>>>>>>> Implementazione funzionalità profilo
    @endif

    @include('post.create')

    <section id="posts">
        <div class="container">
<<<<<<< fb39c731bb38dc87b8d6c98d1578c22ea3991ecd
            @foreach ($posts as $post)
                @include('post.post')
            @endforeach
        </div>
    </section>
=======
        @foreach ($posts as $post)
            @include('post.post', ['state' => 'expand'])
        @endforeach
>>>>>>> Implementazione funzionalità profilo

    @include('layouts.error')

@endsection