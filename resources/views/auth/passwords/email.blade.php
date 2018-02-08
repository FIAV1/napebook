@extends('layouts.master')

@section('css')
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="text-center mb-3">Napebook</h1>

            <div class="card">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        {!! csrf_field() !!}

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label text-lg-right">
                                <label for="email-reset">Indirizzo email</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" id="email-reset" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                            </div>
                                
                            <div class="col-12">
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-8 offset-lg-4 mb-3">
                                <button type="submit" class="btn btn-primary">Invia il link di reset password</button>
                            </div>
                            <div class="col-8 offset-lg-4">
                                <a href="{{ route('index') }}" class="btn btn-secondary">Torna al login</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
