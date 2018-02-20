<section id="login">

	@if(Session::has('type'))
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-{{ Session::get('type') }} alert-dismissible fade show text-center" role="alert">
						{{ Session::get('message') }}
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
				<form class="form-signin" method="POST" action="{{ route('login') }}">

					{{ csrf_field() }}

					<input class="form-control form-control-lg {{ ($errors->getBag('login')->has('login_email') or $errors->getBag('login')->has('credentials')) ? ' is-invalid' : '' }}" type="email" name="login_email" placeholder="Email" aria-label="login_email" required value="{{ old('login_email') }}">

					<input class="form-control form-control-lg {{ ($errors->getBag('login')->has('login_password') or $errors->getBag('login')->has('credentials')) ? ' is-invalid' : '' }}" type="password" name="login_password" placeholder="Password" aria-label="login_password" required>

					@if ($errors->hasBag('login'))
						<div class="invalid-feedback text-center">
							<strong>
								@foreach($errors->getBag('login')->all() as $error)
									{{ $error }}
								@endforeach
							</strong>
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
		<div class="row mt-3">
			<div class="col-12 text-center">
				<span class="mr-3">
					<a class="text-light" href="{{ route('password.request') }}">Password dimenticata?</a>
				</span>
			</div>
		</div>
	</div>
</section>
