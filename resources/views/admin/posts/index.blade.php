@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Instagram Posts
					<a href="{{ route('instagram') }}" class="btn btn-primary btn-xs pull-right">Load Posts</a>
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<th>#</th>
							<th>thumb</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach ($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td><img src="{{ $post->thumb }}" alt="{{ $post->id }}"></td>
								<td></td>
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