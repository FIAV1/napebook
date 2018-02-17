@forelse($friends as $friend)

    <div class="container-fluid my-3">
        <div class="row row-hover">
            <div class="col-2 text-center">
                <img src="/storage/{{ $friend->image_url }}" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md">
            </div>
            <div class="col-5 d-flex">
                <span class="align-self-center"><a href="{{ route('profile-show', $friend->id) }}">{{ $friend->name }}  {{ $friend->surname }}</a></span>
            </div>
            <div class="col-5 d-flex justify-content-center">
                <form class="align-self-center" method="POST" action="{{ route('friendship-delete') }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                    <button type="submit" class="btn btn-danger">Rimuovi dagli amici</button>
                </form>
            </div>
        </div>
    </div>

@empty
    <div class="container-fluid my-3">
        <div class="row row-hover">
            <div class="col-12 text-center">
                <p class="my-3">Nessun amico presente</p>
            </div>
        </div>
    </div>
@endforelse
