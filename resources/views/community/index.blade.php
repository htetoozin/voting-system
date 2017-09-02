@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3>
				<a href="/community">Community </a>
				@if($channel->exists)
					<span> &mdash; {{ $channel->title }}</span>

				@endif
			</h3>
			
			@include('community.list')
		</div> <!-- Community Links -->

		@include('community.add-link')
	</div>
	
@endsection