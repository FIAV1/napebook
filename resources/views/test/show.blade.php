@extends('layouts.master')


@section('content')

    @foreach($users as $user)
        <div class="row">
            <div class="col-12 col-md-7 mx-md-auto mt-3">
                <div id="friendship" class="card text-white mb-2">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="d-flex flex-column align-self-center">
                                <span class="friend"><a href="#">{{ $user->name }} {{ $user->surname }}</a></span>
                            </div>
                            <div class="d-flex flex-column ml-auto align-self-center">
                                <form class="form-add-friendship" method="POST" action="{{ route('add-friend') }}">

                                    {{ csrf_field() }}

                                    <div class="col-6">
                                        <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                        <button type="submit" id="friendshipRequestButton" class="btn btn-success">Aggiungi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection