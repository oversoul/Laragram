@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
@endsection

@section('content')

<div class="container">
	<div class="row user">
		<h3>{{ $user->name }}</h3>
		<h4>{{ '@'.$user->instagram }}</h4>
	</div>
	<div class="media">
		@foreach ( $user->posts as $post )
		<div class="col-md-2">
			<a href="{{ $post->picture }}" class="item">
				<img src="{{ $post->thumb }}" alt="item">
				<small>{{ $post->caption }}</small>
			</a>
		</div>
		@endforeach
    </div>
</div>

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js"></script>
<script src="{{ asset('js/lightbox.js') }}"></script>
<script>
$(document).ready(function() {
	$('.item').magnificPopup({
		type:'image', 
		gallery: { 
			enabled: true, 
			navigateByImgClick: true, 
			preload: [0,1]
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
				return $(item.el).children('small').html();
        	}
        }
	});
});
</script>
@endsection