<div class="container">
@forelse($friends as $friend)
    <div class="row my-5">
        <div class="col-4 col-md-2 text-center">
            <img src="/storage/{{ $friend->image_url }}" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md">
        </div>
        <div class="col-8 col-md-5 d-flex">
            <span class="align-self-center"><a href="{{ route('profile-show', $friend->id) }}">{{ $friend->name }}  {{ $friend->surname }}</a></span>
        </div>
        @can('manageFriendship',$user)
            <div class="col-12 col-md-5 d-flex justify-content-around mt-4 mt-md-0">
                <form class="align-self-center" method="POST" action="{{ route('friendship-delete') }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                    <button type="submit" class="btn btn-danger">Rimuovi dagli amici</button>
                </form>
            </div>
        @endcan
    </div>

@empty
    <div class="row my-5">
        <div class="col-12 text-center">
            <p>Nessun amico presente</p>
        </div>
    </div>
@endforelse
</div>
