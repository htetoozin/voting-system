<ul class="list-group">
	@if(count($links))

	@foreach($links as $link)
	<li class="list-group-item">
		@if(Auth::check() && Auth::user()->votedFor($link))
			+1
		@endif
		<a href="/community/{{ $link->channel->slug }}" class="label label-default" style="background: {{ $link->channel->color }}">
			{{ $link->channel->title }}
		</a>
		<a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>
		Contributed By <a href="#">{{ $link->creator->name }}</a> 
		{{ $link->updated_at->diffForHumans() }}
	</li>

	@endforeach

	@else
		<li>No Contributin yet!</li>
	@endif
</ul>

{{ $links->links() }}
