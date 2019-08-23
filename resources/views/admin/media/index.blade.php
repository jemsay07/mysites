@extends('layouts.app')
@section('title', 'jCode Users')
@section('content')
	<div class="container-full media-wrap">
		<div class="media-header">
			<h3 class="mb-3">Media Library</h3>
			<div class="alert" id="message" style="display:none;"></div>
		</div>
		<div class="media-body">
			<div class="media-attachment">
				<form method="post" id="upload_media" enctype="multipart/form-data" data-href="{{ route('media.store') }}">
					@csrf
					<div class="form-group text-center uploader">
						<h5 class="text-muted my-4">Drop files anywhere to upload</h5>
						<div class="d-block my-4"><input type="file" name="choice_file"></div>
						<input type="submit" name="upload" id="upload" class="btn btn-primary my-2" value="upload">
						<div class="text-muted">
							<span>jpg, png, gif</span>
						</div>
					</div>
				</form>	
			</div>
			<div id="attachment_upload"></div>
		</div>
	</div>
@endsection