@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Instagram Posts
					<div class="pull-right">
						<a href="{{ route('admin.posts.approveall') }}" class="btn btn-success btn-xs">Approve All</a> <a href="{{ route('admin.posts.rejectall') }}" class="btn btn-danger btn-xs">Reject All</a> <a href="{{ route('instagram') }}" class="btn btn-primary btn-xs">Load Posts</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<th>#</th>
							<th>thumb</th>
							<th>Status</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach ($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td><img src="{{ $post->thumb }}" alt="{{ $post->id }}"></td>
								<td>{{ $post->status() }}</td>
								<td>
									<a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">View</a>
									@if ( $post->isPending() )
									<a href="{{ route('admin.posts.approve', $post) }}" class="btn btn-success">
										Approve
									</a>
									@else
									<a href="{{ route('admin.posts.reject', $post) }}" class="btn btn-danger">
										Reject
									</a>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection