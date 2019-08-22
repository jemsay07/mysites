@extends('layouts.app')
@section('title', 'jCode Users')
@section('content')
			
	<div class="container container-lg-w12">
		<span id="opt_result"></span>
		<form id="optionsForm" method="PUT" class="row" data-href="{{ route('settings.update') }}">
			@csrf
			<div class="col-12 col-md-9 col-lg-9">
				<div class="jc-card">
					<div class="jc-card-header">
						<strong>General</strong>
					</div>
					<div class="jc-card-body">
						<div class="form-group row">
							<label for="siteurl" class="col-sm-3 col-form-label text-right">jCode Address (URL)</label>
							<div class="col-sm-9">
								<input type="text" name="siteurl" class="form-control" value="{{ $siteURL->option_value }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="home" class="col-sm-3 col-form-label text-right">Site Address (URL)</label>
							<div class="col-sm-9">
								<input type="text" name="home" class="form-control" value="{{ $homeURL->option_value }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="sitename" class="col-sm-3 col-form-label text-right">Site Title</label>
							<div class="col-sm-9">
								<input type="text" name="sitename" class="form-control" value="{{ $title->option_value }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="sitedescription" class="col-sm-3 col-form-label text-right">Tagline</label>
							<div class="col-sm-9">
								<input type="text" name="sitedescription" class="form-control" value="{{ $desc->option_value }}">
							</div>
						</div>
					</div>
				</div>			
			</div>
			<div class="col-12 col-md-3 col-lg-3">
				<div class="jc-card">
					<div class="jc-card-header">
						<strong>Action</strong>
					</div>
					<div class="jc-card-body">
						<div class="form-group row">
							<button class="btn btn-success" id="option_btn" type="submit">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

@endsection