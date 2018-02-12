<section id="publish" class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto">
                <h4>I tuoi Amici<i class="fas fa-pencil-alt fa-xs ml-3"></i></h4>
            </div>
        </div>
    @foreach($friends as $friend)
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto mt-3">
                <div id="friendship" class="card text-white mb-2">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <!-- <img src="{{ auth()->user()->image }}" alt="user image" class="img-fluid rounded-circle post-author-image"> -->
                            <div class="col-2"><img src="{{ URL::asset('img/user.svg') }}" alt="user image" class="img-fluid rounded-circle post-author-image"></div>
                            <div class="d-flex flex-column align-self-center">
                                <span class="friend"><a href="#">{{ $friend->name }}  {{ $friend->surname }}</a></span>
                            </div>
                            <div class="d-flex flex-column ml-auto align-self-center">
                                <form class="form-remove-friendship" method="POST" action="{{ route('friendship-delete') }}">
                                    <div class="col-6">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="friendship_id" value="{{ $friend->id }}">
                                        <button type="submit" id="friendshipDeleteButton" class="btn btn-danger" >Rimuovi dagli amici</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>