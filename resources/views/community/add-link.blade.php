@if(Auth::check())

	<div class="col-md-4">	
				<h3>Contribute a Link</h3>
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="POST" action="/community">
							{{ csrf_field() }}
							
							<div class="form-group {{ $errors->has('channel_id') ? 'has-error' : ''}}">
								<select name="channel_id" class="form-control">
									<option selected disabled>Pick a Channel...</option>
									
									@foreach($channels as $channel)
										<option value="{{ $channel->id }}" 
													{{ old('channel_id') == $channel->id ? 'selected' : '' }}>
											{{ $channel->title }}
										</option>
									@endforeach
									
								</select>

								@if($errors->has('channel_id'))
									<span class="text-danger">{{ $errors->first('channel_id') }}</span>
								@endif
								
							</div>

							<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
								<label for="Title">Title:</label>
								<input type="text" 
								       name="title" class="form-control" 
								       placeholder="What is title of your article?" 
								       value="{{ old('title') }}">

								@if($errors->has('title'))
									<span class="text-danger">{{ $errors->first('title') }}</span>
								@endif
							</div>
							
							<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
								<label for="links">Link:</label>
								<input type="text" 
										name="link" 
										class="form-control" 
										placeholder="What is the URL?"
										value="{{ old('link') }}">
								@if($errors->has('link'))
									<span class="text-danger">{{ $errors->first('link') }}</span>
								@endif
							</div>
							
							<div class="form-group">
								<button class="btn btn-primary">Contribute Link</button>
							</div>

						</form>
					</div>
				</div>
	</div> <!-- Channel-->
@else
	<p>Please Sign in.</p>
@endif