@extends('layouts.master')

@section('content')

	@include('auth.login')

	@include('auth.register')

@endsection

@section('scripts')
<script type="text/javascript">
	@if ($errors->hasBag('register'))
		$(document).ready(function(){
			$("#registrationModal").modal('show');
		});
	@endif
</script>
@endsection