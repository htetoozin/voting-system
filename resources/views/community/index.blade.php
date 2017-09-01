@extends('layouts.app')


@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Community</h1>
			<ul>
				@if(count($links))

					@foreach($links as $link)
					<li>
						<span class="label label-default" style="background: {{ $link->channel->color }}">
							{{ $link->channel->title }}
						</span>
						<a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>
						Contributed By <a href="#">{{ $link->creator->name }}</a> 
						{{ $link->updated_at->diffForHumans() }}
					</li>

					@endforeach

				@else
					<li>No Contributin yet!</li>
				@endif
			</ul>
		</div> <!-- Community Links -->

		@include('community.add-link')
	</div>
	
@endsection