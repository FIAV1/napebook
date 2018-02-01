@extends('layouts.master')

@section('css')
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="login">

	@if(Session::has('type'))
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show" role="alert">
						<p class="text-centered">{{ Session::get('message') }}</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	@endif

	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1>Accedi a Napebook</h1>
				<form class="form-signin" method="POST" action="{{-- route('login') --}}">

					{{ csrf_field() }}

					<input class="form-control form-control-lg {{ $errors->has('login') ? ' is-invalid' : '' }}" type="email" placeholder="Email" aria-label="Email" required value="{{ old('email') }}">

					<input class="form-control form-control-lg {{ $errors->has('login') ? ' is-invalid' : '' }}" type="password" placeholder="Password" aria-label="Password" required>

					@if ($errors->has('login'))
						<div class="invalid-feedback text-center">
							<strong>Credenziali non corrette</strong>
						</div>
					@endif

					<div class="checkbox mb-3 text-center">
						<label>
							<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ricordami
						</label>
					</div>

					<button class="btn btn-lg btn-outline-success btn-block" type="submit">Accedi</button>

				</form>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 text-center">
				<span class="mr-3">Non hai un account?</span>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#registrationModal">Registrati</button>
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registration" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="registration">Registrati</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-10 offset-md-1">
							<form class="form-horizontal" method="POST" action="{{ route('register') }}">

								{!! csrf_field() !!}

								<div class="form-group row">

									<div class="col-12 col-md-6 mb-sm">
										<label class="sr-only" for="name">Nome</label>
										<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="name" placeholder="Nome" required value="{{ old('name') }}">
										@if ($errors->has('name'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('name') }}</strong>
											</div>
										@endif
									</div>

									<div class="col-12 col-md-6">
										<label class="sr-only" for="surname">Cognome</label>
										<input type="text" name="surname" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" id="surname" aria-describedby="surname" placeholder="Cognome" required value="{{ old('surname') }}">
										@if ($errors->has('surname'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('surname') }}</strong>
											</div>
										@endif
									</div>

								</div>

								<div class="form-group row">
									<div class="col-12">
										<label class="sr-only" for="registration_email">Email</label>
										<input type="email" name="registration_email" class="form-control {{ $errors->has('registration_email') ? ' is-invalid' : '' }}" id="registration_email" aria-describedby="registration_email" placeholder="Indirizzo email" required value="{{ old('registration_email') }}">
										@if ($errors->has('registration_email'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('registration_email') }}</strong>
											</div>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12 col-md-6 mb-sm">
										<label class="sr-only" for="password">Password</label>
										<input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" aria-describedby="password" placeholder="Nuova password" required >
										@if ($errors->has('password'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('password') }}</strong>
											</div>
										@endif
									</div>

									<div class="col-12 col-md-6">
										<label class="sr-only" for="">Conferma password</label>
										<input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" id="" aria-describedby="" placeholder="Conferma password" required>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<label class="sr-only" for="birthday">Data di nascita</label>
										<input type="date" name="birthday" class="form-control {{ $errors->has('birthday') ? ' is-invalid' : '' }}" id="birthday" aria-describedby="birthday" required value="{{ old('birthday') }}">
										@if ($errors->has('birthday'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('birthday') }}</strong>
											</div>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<div class="form-check form-check-inline">
											<input class="form-check-input {{ $errors->has('sex') ? ' is-invalid' : '' }}" type="radio" name="sex" id="male" value="M" required @if( old('sex') == 'M') checked @endif>
											<label class="form-check-label" for="male">Uomo</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input {{ $errors->has('sex') ? ' is-invalid' : '' }}" type="radio" name="sex" id="female" value="F" required @if( old('sex') == 'F') checked @endif>
											<label class="form-check-label" for="female">Donna</label>
										</div>
										@if ($errors->has('sex'))
											<div class="invalid-feedback">
												<strong>{{ $errors->first('sex') }}</strong>
											</div>
										@endif
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<button type="submit" class="btn btn-outline-primary mr-2">Registrati</button>

										<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
    	</div>
  	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	@if ($errors->any())
		$(document).ready(function(){
			$("#registrationModal").modal('show');
		});
	@endif
</script>
@endsection