@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ config('app.name') }} Dashboard</div>
				<div class="panel-body">
					@if ( ! Auth::user()->instagram )
					<div class="alert alert-info">
						<b>We noticed your account was not ready yet!</b>
						<p>
							please visit the <a href="{{ route('settings') }}">setting</a> page to setup your account.
						</p>			
					</div>
					@endif
					<h1>Posts</h1>
					<div class="row dash">
						<div class="col-md-4">
							<div class="item">
								<h3>Total</h3>
								<p>{{ $posts }}</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item">
								<h3>Approved</h3>
								<p>{{ $approved }}</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="item">
								<h3>Postponed</h3>
								<p>{{ $postponed }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection