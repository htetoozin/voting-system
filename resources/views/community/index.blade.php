@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3>
				<a href="{{ request()->url() }}">Community </a>
				@if($channel->exists)
					<span> &mdash; {{ $channel->title }}</span>

				@endif
			</h3>

			<ul class="nav nav-tabs">
				<li class="{{ request()->exists('popular') ? '' : 'active' }}">
					<a href="/community">Most Recent</a>
				</li>
				<li class="{{ request()->exists('popular') ? 'active' : ''}}">
					<a href="?popular">Most Popular</a>
				</li>
			</ul>
			
			@include('community.list')
		</div> <!-- Community Links -->

		@include('community.add-link')
	</div>
	
@endsection