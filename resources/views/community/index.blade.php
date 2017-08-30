@extends('layouts.app')


@section('content')

<div class="container">
	<h1>Community</h1>

	<ul>
		
	</ul>

	@foreach($links as $link)
		<li>
			<a href="{{ $link->link }}" target="_blank">{{ $link->title }}</a>
			Contributed By <a href="#">{{ $link->creator->name }}</a> 
			{{ $link->updated_at->diffForHumans() }}
		</li>

	@endforeach
</div>

@endsection