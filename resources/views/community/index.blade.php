@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">
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
		</div> <!-- Community Links -->

		<div class="col-md-4">	
			<h3>Contribute a Link</h3>
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="POST" action="">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="Title">Title:</label>
							<input type="text" name="title" class="form-control" placeholder="What is title of your article?">
						</div>
						
						<div class="form-group">
							<label for="links">Link:</label>
							<input type="text" name="link" class="form-control" placeholder="What is the URL?">
						</div>
						
						<div class="form-group">
							<button class="btn btn-primary">Contribute Link</button>
						</div>

					</form>
				</div>
			</div>
		</div> <!-- Channel-->
	</div>
	

@endsection