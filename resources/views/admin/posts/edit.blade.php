@extends('layouts.admin')


@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Post [{{ $post->id }}]
					@if ( $post->isPending() )
						<a href="{{ route('admin.posts.approve', $post) }}" class="btn btn-success btn-xs pull-right">Approve</a>
					@else
						<a href="{{ route('admin.posts.reject', $post) }}" class="btn btn-danger btn-xs pull-right">Reject</a>
					@endif
				</div>
				<div class="panel-body">
					<h3>Thumbail</h3>
					<img src="{{ $post->thumb }}" alt="{{ $post->id }}">
					<h3>Caption:</h3>
					<p>{{ $post->caption }}</p>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection