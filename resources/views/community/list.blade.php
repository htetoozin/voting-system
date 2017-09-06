<ul class="list-group">
	@if(count($links))

	@foreach($links as $link)
	<li class="CommunityLink list-group-item">

		<form method="POST" action="/votes/{{ $link->id }}">
			{{ csrf_field() }}
			<button class="btn {{ Auth::user()->votedFor($link) ? 'btn-success' : 'btn-default'}}" {{ Auth::guest() ? 'disabled' : ''}}>
				{{ $link->votes->count() }}
			</button>
		</form>
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

{{ $links->appends(request()->query())->links() }}
